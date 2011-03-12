<?php

/**
 * Uzywka form base class.
 *
 * @method Uzywka getObject() Returns the current form's model object
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUzywkaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'badanie_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Badanie'), 'add_empty' => true)),
      'typ'        => new sfWidgetFormChoice(array('choices' => array('ap' => 'ap', 'bp' => 'bp', 'np' => 'np', 'aa' => 'aa', 'iu' => 'iu'))),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'badanie_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Badanie'), 'required' => false)),
      'typ'        => new sfValidatorChoice(array('choices' => array(0 => 'ap', 1 => 'bp', 2 => 'np', 3 => 'aa', 4 => 'iu'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('uzywka[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Uzywka';
  }

}
