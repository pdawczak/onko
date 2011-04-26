<?php

/**
 * Widmo filter form base class.
 *
 * @package    onko_gliwice
 * @subpackage filter
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseWidmoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sdat'             => new sfWidgetFormFilterInput(),
      'spar'             => new sfWidgetFormFilterInput(),
      'lokalizacja_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Lokalizacja'), 'add_empty' => true)),
      'rozmiar_voxela_x' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rozmiar_voxela_y' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rozmiar_voxela_z' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'te'               => new sfWidgetFormFilterInput(),
      'tr'               => new sfWidgetFormFilterInput(),
      'ns'               => new sfWidgetFormFilterInput(),
      'wynik_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('WynikBadania'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'sdat'             => new sfValidatorPass(array('required' => false)),
      'spar'             => new sfValidatorPass(array('required' => false)),
      'lokalizacja_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Lokalizacja'), 'column' => 'id')),
      'rozmiar_voxela_x' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'rozmiar_voxela_y' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'rozmiar_voxela_z' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'te'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tr'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ns'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wynik_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('WynikBadania'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('widmo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Widmo';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'sdat'             => 'Text',
      'spar'             => 'Text',
      'lokalizacja_id'   => 'ForeignKey',
      'rozmiar_voxela_x' => 'Number',
      'rozmiar_voxela_y' => 'Number',
      'rozmiar_voxela_z' => 'Number',
      'te'               => 'Number',
      'tr'               => 'Number',
      'ns'               => 'Number',
      'wynik_id'         => 'ForeignKey',
    );
  }
}
