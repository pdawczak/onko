<?php

/**
 * DietaProdukt form base class.
 *
 * @method DietaProdukt getObject() Returns the current form's model object
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDietaProduktForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'dieta_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Dieta'), 'add_empty' => true)),
      'produkt_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Produkt'), 'add_empty' => true)),
      'duza_ilosc' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'dieta_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Dieta'), 'required' => false)),
      'produkt_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Produkt'), 'required' => false)),
      'duza_ilosc' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dieta_produkt[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DietaProdukt';
  }

}
