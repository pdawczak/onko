<?php

/**
 * Cecha form.
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CechaForm extends BaseCechaForm
{
  public function configure()
  {
    $this->useFields(array('typ_cechy_id', 'wartosc'));
//    $this->useFields(array('wartosc'));
    $this->widgetSchema['typ_cechy_id'] = new sfWidgetFormInputHidden();

    $typ = $this->getObject()->TypCechy->typ;
    
    if ('date' == $typ)
    {
      $this->widgetSchema['wartosc']    = new sfWidgetFormDate();
      $this->validatorSchema['wartosc'] = new sfValidatorDate();
    }

    if ('bool' == $typ)
    {
      $this->widgetSchema['wartosc']    = new sfWidgetFormInputCheckbox();
      $this->validatorSchema['wartosc'] = new sfValidatorBoolean(array('required' => false));
    }

    if ('decimal' == $typ)
    {
      $this->validatorSchema['wartosc'] = new sfValidatorInteger();
    }

    $this->widgetSchema->setLabels(array(
      'wartosc' => false
    ));
  }
}
