<?php

/**
 * Cecha filter form base class.
 *
 * @package    onko_gliwice
 * @subpackage filter
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCechaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'uzywka_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Uzywka'), 'add_empty' => true)),
      'typ_cechy_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TypCechy'), 'add_empty' => true)),
      'wartosc'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'uzywka_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Uzywka'), 'column' => 'id')),
      'typ_cechy_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TypCechy'), 'column' => 'id')),
      'wartosc'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cecha_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cecha';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'uzywka_id'    => 'ForeignKey',
      'typ_cechy_id' => 'ForeignKey',
      'wartosc'      => 'Text',
    );
  }
}
