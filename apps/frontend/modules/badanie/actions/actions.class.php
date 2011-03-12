<?php

/**
 * badanie actions.
 *
 * @package    onko_gliwice
 * @subpackage badanie
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class badanieActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->badanies = Doctrine_Core::getTable('Badanie')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->badanie = Doctrine_Core::getTable('Badanie')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->badanie);
    $this->pacjent = Doctrine_Core::getTable('Pacjent')->find($request->getParameter('pacjent_id'));
    if (! $this->badanie->getWynikBadania())
    {
      die('Nie ma wyników do tgo badania');
    }
    else
    {
      die('Są wyniki do tego badania');
    }
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->pacjent = $this->getRoute()->getObject();
    $this->forward404Unless($this->pacjent);

    $badanie = new Badanie();
    $badanie->setPacjent($this->pacjent);

    $this->form = new BadanieForm($badanie);
    $this->form->embedForm('Papierosy', new myAktywnePalenieForm());
//    $this->form->embedForm('Narazenie', new myBiernePalenieForm());
    $this->form->embedForm('Alkohol', new myAlkoholForm());
    for ($i = 0; $i < 5; $i++) {
      $this->form->embedForm("Inne-{$i}", new myInneUzywkiForm());
    }
    
    $this->typy_cech = array();
    $tmp = TypCechyTable::getInstance()->findAll();
    
    foreach ($tmp as $item)
    {
      $this->typy_cech[$item->getSlug()]['id'] = $item->getId();
    }
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BadanieForm();
//    $this->form->embedForm('Papierosy', new myAktywnePalenieForm());
//    $this->form->embedForm('Narazenie', new myBiernePalenieForm());
    $this->form->embedForm('Alkohol', new myAlkoholForm());
    for ($i = 0; $i < 5; $i++) {
      $this->form->embedForm("Inne-{$i}", new myInneUzywkiForm());
    }

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($badanie = Doctrine_Core::getTable('Badanie')->find(array($request->getParameter('id'))), sprintf('Object badanie does not exist (%s).', $request->getParameter('id')));
    $this->form = new BadanieForm($badanie);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($badanie = Doctrine_Core::getTable('Badanie')->find(array($request->getParameter('id'))), sprintf('Object badanie does not exist (%s).', $request->getParameter('id')));
    $this->form = new BadanieForm($badanie);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($badanie = Doctrine_Core::getTable('Badanie')->find(array($request->getParameter('id'))), sprintf('Object badanie does not exist (%s).', $request->getParameter('id')));
    $badanie->delete();

    $this->redirect('badanie/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $badanie = $form->save();

//      $this->redirect('badanie/edit?id='.$badanie->getId());
    }
  }

  public function executeBadaniaPacjent($request)
  {
    $pacjent = $this->getRoute()->getObject();
    $this->forward404Unless($pacjent);
    $result = BadanieTable::getInstance()->myGetBadaniaSortedQuery($pacjent)->execute(array(), Doctrine_Core::HYDRATE_ARRAY);

    return $this->renderText(json_encode(array(
      'records' => $result
    )));
  }

  public function executeSubmit(sfWebRequest $request)
  {
    $this->pacjent = $this->getRoute()->getObject();
    $this->forward404Unless($this->pacjent);

    $form = BadanieForm::createBadanieForm($this->pacjent, $request);

    $values = BadanieForm::clearValues(
      $request->getParameter('papierosy_przelacznik'),
      $request->getParameter($form->getName())
    );

    $result = myCore::processFormWithValues($form, $values, 'badanie_szczegoly');
    return $this->renderText($result);
  }

  public function executeParse(sfWebRequest $request)
  {
    $temp = Widmo::getRawArrayFromCoordFile(file_get_contents(sfConfig::get('sf_upload_dir').'/coord.csv'));

    var_dump($this->extractParams($temp));

    return sfView::NONE;
  }

  protected function extractParams(array $params)
  {
    $wz   = new WidmoWzgorze();
    $isp  = new WidmoIstotaSzaraPotyliczna();
    $isc  = new WidmoIstotaSzaraCzolowa();

    Widmo::processExtractingData($params, $wz, $isp, $isc);

    $result = array(
      'wz'  => $wz->getRawData(),
      'isp' => $isp->getRawData(),
      'isc' => $isc->getRawData()
    );

    return $result;
  }
}
