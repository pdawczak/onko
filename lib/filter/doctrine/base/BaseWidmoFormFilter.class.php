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
      'skala_ppm'        => new sfWidgetFormFilterInput(),
      'widmo'            => new sfWidgetFormFilterInput(),
      'linia_bazowa'     => new sfWidgetFormFilterInput(),
      'widmo_bazowa'     => new sfWidgetFormFilterInput(),
      'lokalizacja'      => new sfWidgetFormChoice(array('choices' => array('' => '', 'wz' => 'wz', 'isc' => 'isc', 'isp' => 'isp'))),
      'rozmiar_voxela_x' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rozmiar_voxela_y' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rozmiar_voxela_z' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'stezenia'         => new sfWidgetFormFilterInput(),
      'te'               => new sfWidgetFormFilterInput(),
      'tr'               => new sfWidgetFormFilterInput(),
      'ns'               => new sfWidgetFormFilterInput(),
      'wynik_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('WynikBadania'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'skala_ppm'        => new sfValidatorPass(array('required' => false)),
      'widmo'            => new sfValidatorPass(array('required' => false)),
      'linia_bazowa'     => new sfValidatorPass(array('required' => false)),
      'widmo_bazowa'     => new sfValidatorPass(array('required' => false)),
      'lokalizacja'      => new sfValidatorChoice(array('required' => false, 'choices' => array('wz' => 'wz', 'isc' => 'isc', 'isp' => 'isp'))),
      'rozmiar_voxela_x' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'rozmiar_voxela_y' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'rozmiar_voxela_z' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'stezenia'         => new sfValidatorPass(array('required' => false)),
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
      'skala_ppm'        => 'Text',
      'widmo'            => 'Text',
      'linia_bazowa'     => 'Text',
      'widmo_bazowa'     => 'Text',
      'lokalizacja'      => 'Enum',
      'rozmiar_voxela_x' => 'Number',
      'rozmiar_voxela_y' => 'Number',
      'rozmiar_voxela_z' => 'Number',
      'stezenia'         => 'Text',
      'te'               => 'Number',
      'tr'               => 'Number',
      'ns'               => 'Number',
      'wynik_id'         => 'ForeignKey',
    );
  }
}
