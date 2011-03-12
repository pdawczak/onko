<?php

/**
 * TypCechy form base class.
 *
 * @method TypCechy getObject() Returns the current form's model object
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTypCechyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'nazwa' => new sfWidgetFormInputText(),
      'typ'   => new sfWidgetFormChoice(array('choices' => array('decimal' => 'decimal', 'date' => 'date', 'bool' => 'bool', 'string' => 'string'))),
      'slug'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nazwa' => new sfValidatorString(array('max_length' => 30)),
      'typ'   => new sfValidatorChoice(array('choices' => array(0 => 'decimal', 1 => 'date', 2 => 'bool', 3 => 'string'))),
      'slug'  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'TypCechy', 'column' => array('nazwa'))),
        new sfValidatorDoctrineUnique(array('model' => 'TypCechy', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('typ_cechy[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TypCechy';
  }

}
