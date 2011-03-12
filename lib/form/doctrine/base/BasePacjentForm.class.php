<?php

/**
 * Pacjent form base class.
 *
 * @method Pacjent getObject() Returns the current form's model object
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePacjentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'imie'           => new sfWidgetFormInputText(),
      'nazwisko'       => new sfWidgetFormInputText(),
      'pesel'          => new sfWidgetFormInputText(),
      'data_urodzenia' => new sfWidgetFormDate(),
      'plec'           => new sfWidgetFormChoice(array('choices' => array('m' => 'm', 'k' => 'k'))),
      'wzrost'         => new sfWidgetFormInputText(),
      'waga'           => new sfWidgetFormInputText(),
      'reka'           => new sfWidgetFormChoice(array('choices' => array('p' => 'p', 'l' => 'l', 'o' => 'o'))),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'imie'           => new sfValidatorString(array('max_length' => 20)),
      'nazwisko'       => new sfValidatorString(array('max_length' => 50)),
      'pesel'          => new sfValidatorString(array('max_length' => 11)),
      'data_urodzenia' => new sfValidatorDate(),
      'plec'           => new sfValidatorChoice(array('choices' => array(0 => 'm', 1 => 'k'), 'required' => false)),
      'wzrost'         => new sfValidatorPass(),
      'waga'           => new sfValidatorNumber(),
      'reka'           => new sfValidatorChoice(array('choices' => array(0 => 'p', 1 => 'l', 2 => 'o'), 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Pacjent', 'column' => array('pesel')))
    );

    $this->widgetSchema->setNameFormat('pacjent[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pacjent';
  }

}
