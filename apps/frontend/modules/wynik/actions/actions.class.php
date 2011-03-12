<?php

/**
 * wynik actions.
 *
 * @package    onko_gliwice
 * @subpackage wynik
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wynikActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->wynik_badanias = Doctrine_Core::getTable('WynikBadania')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->wynik_badania = Doctrine_Core::getTable('WynikBadania')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->wynik_badania);
  }

  public function executeNew(sfWebRequest $request)
  {

    $this->form = new WynikBadaniaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new WynikBadaniaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($wynik_badania = Doctrine_Core::getTable('WynikBadania')->find(array($request->getParameter('id'))), sprintf('Object wynik_badania does not exist (%s).', $request->getParameter('id')));
    $this->form = new WynikBadaniaForm($wynik_badania);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($wynik_badania = Doctrine_Core::getTable('WynikBadania')->find(array($request->getParameter('id'))), sprintf('Object wynik_badania does not exist (%s).', $request->getParameter('id')));
    $this->form = new WynikBadaniaForm($wynik_badania);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($wynik_badania = Doctrine_Core::getTable('WynikBadania')->find(array($request->getParameter('id'))), sprintf('Object wynik_badania does not exist (%s).', $request->getParameter('id')));
    $wynik_badania->delete();

    $this->redirect('wynik/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $wynik_badania = $form->save();

      $this->redirect('wynik/edit?id='.$wynik_badania->getId());
    }
  }
}
