<?php

/**
 * Cecha form base class.
 *
 * @method Cecha getObject() Returns the current form's model object
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCechaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'uzywka_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Uzywka'), 'add_empty' => true)),
      'typ_cechy_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TypCechy'), 'add_empty' => true)),
      'wartosc'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'uzywka_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Uzywka'), 'required' => false)),
      'typ_cechy_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TypCechy'), 'required' => false)),
      'wartosc'      => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('cecha[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cecha';
  }

}
