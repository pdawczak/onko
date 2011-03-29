<?php

/**
 * Chemioterapia form base class.
 *
 * @method Chemioterapia getObject() Returns the current form's model object
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseChemioterapiaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'data_rozpoczecia' => new sfWidgetFormDate(),
      'data_zakonczenia' => new sfWidgetFormDate(),
      'lek_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Leki'), 'add_empty' => true)),
      'pacjent_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pacjent'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'data_rozpoczecia' => new sfValidatorDate(array('required' => false)),
      'data_zakonczenia' => new sfValidatorDate(array('required' => false)),
      'lek_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Leki'), 'required' => false)),
      'pacjent_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pacjent'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('chemioterapia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Chemioterapia';
  }

}
