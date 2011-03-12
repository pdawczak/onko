<?php

/**
 * Badanie form base class.
 *
 * @method Badanie getObject() Returns the current form's model object
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBadanieForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'pacjent_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pacjent'), 'add_empty' => true)),
      'data_badania' => new sfWidgetFormDate(),
      'inne'         => new sfWidgetFormInputText(),
      'menstruacja'  => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'pacjent_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pacjent'), 'required' => false)),
      'data_badania' => new sfValidatorDate(),
      'inne'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'menstruacja'  => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('badanie[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Badanie';
  }

}
