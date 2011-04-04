<?php

/**
 * Dieta form base class.
 *
 * @method Dieta getObject() Returns the current form's model object
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDietaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'badanie_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Badanie'), 'add_empty' => true)),
      'bezmiesna'    => new sfWidgetFormInputCheckbox(),
      'zroznicowana' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'badanie_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Badanie'), 'required' => false)),
      'bezmiesna'    => new sfValidatorBoolean(array('required' => false)),
      'zroznicowana' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dieta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dieta';
  }

}
