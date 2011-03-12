<?php

/**
 * Badanie form.
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BadanieForm extends BaseBadanieForm
{
  public function configure()
  {
    $this->useFields(array('pacjent_id', 'data_badania', 'menstruacja', 'inne'));
    $this->widgetSchema['pacjent_id'] = new sfWidgetFormInputHidden();

//    $this->useFields(array('data_badania', 'menstruacja', 'inne'));

    // Jeżeli badanie dotyczy mężczyzny, nie jest pokazywane
    // pole informujące, czy badanie odbywa się w trakcie menstruacji
    if ('m' == $this->getObject()->getPacjent()->getPlec())
    {
      unset ($this['menstruacja']);
    }
  }
  
  public function embedForm($name, sfForm $form, $decorator = null)
  {
    // Dodanie sprawdzenia, czy embeddowany objekt to używka i dodanie do
    // niego obiektu badania (pobierze wtedy wartość pola badanie_id)
    if ($form->getObject() instanceof Uzywka)
    {
      $form->getObject()->setBadanie($this->getObject());
    }
    parent::embedForm($name, $form, $decorator);
  }

  public function saveEmbeddedForms($con = null, $forms = null)
  {
    if (null === $forms)
    {
      $forms = $this->embeddedForms;
      $values = $this->getValues();

      // Trzeba "unsetnąć" formularze z niewypełnionymi używkami
      for ($i = 0; isset($forms["Inne-{$i}"]); $i++)
      {
        if (empty ($values["Inne-{$i}"]['Cechy']))
        {
          unset ($forms["Inne-{$i}"]);
        }
      }
    }

    return parent::saveEmbeddedForms($con, $forms);
  }

  /**
   *
   * @param Pacjent $pacjent
   * @param sfWebRequest $request
   * @return BadanieForm
   */
  public static function createBadanieForm(Pacjent $pacjent, sfWebRequest $request, $count_inne_forms = 5)
  {
    $badanie = new Badanie();
    $badanie->setPacjent($pacjent);

    $form = new BadanieForm($badanie);
    $values = $request->getParameter($form->getName());
    $values['pacjent_id'] = $pacjent->getId();

    switch ($request->getParameter('papierosy_przelacznik'))
    {
      case 'np':
        unset ($values['Papierosy'], $values['Narazenie']);
        break;
      case 'bp':
        unset ($values['Papierosy']);
        $form->embedForm('Narazenie', new myBiernePalenieForm());
        break;
      case 'ap':
        unset ($values['Narazenie']);
        $form->embedForm('Papierosy', new myAktywnePalenieForm());
        break;
    }

    $form->embedForm('Alkohol', new myAlkoholForm());
    for ($i = 0; $i < $count_inne_forms; $i++) {
      $form->embedForm("Inne-{$i}", new myInneUzywkiForm());
    }

    return $form;
  }

  public static function clearValues($przelacznik, $values)
  {
    switch ($przelacznik)
    {
      case 'np':
        unset ($values['Papierosy'], $values['Narazenie']);
        break;
      case 'bp':
        unset ($values['Papierosy']);
        break;
      case 'ap':
        unset ($values['Narazenie']);
        break;
    }
    return $values;
  }
}
