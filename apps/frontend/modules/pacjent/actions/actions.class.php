<?php

/**
 * pacjent actions.
 *
 * @package    onko_gliwice
 * @subpackage pacjent
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pacjentActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->pacjents = Doctrine_Core::getTable('Pacjent')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->pacjent = Doctrine_Core::getTable('Pacjent')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->pacjent);
    $this->badania = $this->pacjent->getBadania();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PacjentForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PacjentForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($pacjent = Doctrine_Core::getTable('Pacjent')->find(array($request->getParameter('id'))), sprintf('Object pacjent does not exist (%s).', $request->getParameter('id')));
    $this->form = new PacjentForm($pacjent);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($pacjent = Doctrine_Core::getTable('Pacjent')->find(array($request->getParameter('id'))), sprintf('Object pacjent does not exist (%s).', $request->getParameter('id')));
    $this->form = new PacjentForm($pacjent);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($pacjent = Doctrine_Core::getTable('Pacjent')->find(array($request->getParameter('id'))), sprintf('Object pacjent does not exist (%s).', $request->getParameter('id')));
    $pacjent->delete();

    $this->redirect('pacjent/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $obj = $form->save();

      if (get_class($obj) != 'Pacjent')
      {
        $obj = $obj->getPacjent();
      }

      $this->redirect('pacjent_show', $obj);
    }
  }

  public function executeFetch(sfWebRequest $request)
  {
    $limit  = $request->getParameter('limit', 20);
    $page   = $request->getParameter('start', 0) / $limit + 1;
    $query  = PacjentTable::getInstance()->myFindAllQuery(
        $request->getParameter('sort', 'nazwisko'),
        $request->getParameter('dir', 'ASC')
    );

    $pager = myCore::createPager('Pacjent', $query, $page, $limit);

    return $this->renderText(json_encode(array(
      'records'     => $pager->getResults(Doctrine_Core::HYDRATE_ARRAY),
      'totalCount'  => $pager->getNbResults()
    )));
  }

  public function executeSearch(sfWebRequest $request)
  {
    $query = $request->getParameter('query');
    $start = $request->getParameter('start', 0);
    $limit = $request->getParameter('limit', 20);

    $pager = myCore::createPager('Pacjent', PacjentTable::searchQueryHelper($query), $start, $limit);

    $results = $pager->getResults(Doctrine_Core::HYDRATE_ARRAY);
    for ($i = 0; $i < count($results); $i++)
    {
      $tmp = substr($results[$i]['nazwisko_imie'], 0, strlen($query));
      $results[$i]['nazwisko_imie_highlight'] = str_ireplace($query, '<b>'.$tmp.'</b>', $results[$i]['nazwisko_imie']);
      $results[$i]['pesel']                   = str_ireplace($query, '<b>'.$query.'</b>', $results[$i]['pesel']);
    }

    return $this->renderText(json_encode(array(
      'records'     => $results,
      'totalCount'  => $pager->getNbResults()
    )));
  }
  
  public function executeSubmit(sfWebRequest $request)
  {
    $result = myCore::processFormWithRequest(new PacjentForm(), $request, 'pacjent', 'pacjent_show');
    return $this->renderText($result);
  }

  public function executeExport($request)
  {
    $this->pacjent = $this->getRoute()->getObject();
  }

  public function executeDodaj_radioterapie(sfWebRequest $request)
  {
    $this->pacjent = $this->getRoute()->getObject();

    $radioterapia = new Radioterapia();
    $radioterapia->setPacjent($this->pacjent);

    $this->form = new RadioterapiaForm($radioterapia);
    
    if ($request->getMethod() == sfRequest::POST)
    {
      $this->processForm($request, $this->form);
    }
  }

  public function executeDodaj_chemioterapie(sfWebRequest $request)
  {
    $this->pacjent = $this->getRoute()->getObject();
    
    $chemioterapia = new Chemioterapia();
    $chemioterapia->setPacjent($this->pacjent);

    $this->form = new ChemioterapiaForm($chemioterapia);

    if ($request->getMethod() == sfRequest::POST)
    {
      $this->processForm($request, $this->form);
    }
  }
}
