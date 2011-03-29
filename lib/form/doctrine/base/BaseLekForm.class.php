<?php

/**
 * Lek form base class.
 *
 * @method Lek getObject() Returns the current form's model object
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLekForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'nazwa_leku' => new sfWidgetFormInputText(),
      'rodzaj'     => new sfWidgetFormChoice(array('choices' => array('a' => 'a', 'c' => 'c', 'i' => 'i'))),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nazwa_leku' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'rodzaj'     => new sfValidatorChoice(array('choices' => array(0 => 'a', 1 => 'c', 2 => 'i'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lek[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lek';
  }

}
