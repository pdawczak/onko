<?php

/**
 * DietaProdukt filter form base class.
 *
 * @package    onko_gliwice
 * @subpackage filter
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDietaProduktFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'dieta_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Dieta'), 'add_empty' => true)),
      'produkt_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Produkt'), 'add_empty' => true)),
      'duza_ilosc' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'dieta_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Dieta'), 'column' => 'id')),
      'produkt_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Produkt'), 'column' => 'id')),
      'duza_ilosc' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('dieta_produkt_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DietaProdukt';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'dieta_id'   => 'ForeignKey',
      'produkt_id' => 'ForeignKey',
      'duza_ilosc' => 'Boolean',
    );
  }
}
