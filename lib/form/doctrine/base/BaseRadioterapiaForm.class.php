<?php

/**
 * Radioterapia form base class.
 *
 * @method Radioterapia getObject() Returns the current form's model object
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRadioterapiaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'data_rozpoczecia'       => new sfWidgetFormDate(),
      'dawka_fr'               => new sfWidgetFormInputText(),
      'dawka_total'            => new sfWidgetFormInputText(),
      'data_zakonczenia'       => new sfWidgetFormDate(),
      'stereo'                 => new sfWidgetFormInputCheckbox(),
      'gtv'                    => new sfWidgetFormInputText(),
      'ctv'                    => new sfWidgetFormInputText(),
      'ptv'                    => new sfWidgetFormInputText(),
      'pacjent_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pacjent'), 'add_empty' => true)),
      'rodzaj_radioterapii_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RodzajRadioterapii'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'data_rozpoczecia'       => new sfValidatorDate(array('required' => false)),
      'dawka_fr'               => new sfValidatorNumber(array('required' => false)),
      'dawka_total'            => new sfValidatorNumber(array('required' => false)),
      'data_zakonczenia'       => new sfValidatorDate(array('required' => false)),
      'stereo'                 => new sfValidatorBoolean(array('required' => false)),
      'gtv'                    => new sfValidatorPass(array('required' => false)),
      'ctv'                    => new sfValidatorPass(array('required' => false)),
      'ptv'                    => new sfValidatorPass(array('required' => false)),
      'pacjent_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pacjent'), 'required' => false)),
      'rodzaj_radioterapii_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RodzajRadioterapii'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('radioterapia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Radioterapia';
  }

}
