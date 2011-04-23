<?php

/**
 * WynikBadania form base class.
 *
 * @method WynikBadania getObject() Returns the current form's model object
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWynikBadaniaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'ocena_stanu_guza' => new sfWidgetFormChoice(array('choices' => array('wz' => 'wz', 'pr' => 'pr', 'stg' => 'stg', 'bcg' => 'bcg'))),
      'badanie_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Badanie'), 'add_empty' => true)),
      'sdat'             => new sfWidgetFormTextarea(),
      'spar'             => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'ocena_stanu_guza' => new sfValidatorChoice(array('choices' => array(0 => 'wz', 1 => 'pr', 2 => 'stg', 3 => 'bcg'), 'required' => false)),
      'badanie_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Badanie'), 'required' => false)),
      'sdat'             => new sfValidatorString(array('required' => false)),
      'spar'             => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wynik_badania[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WynikBadania';
  }

}
