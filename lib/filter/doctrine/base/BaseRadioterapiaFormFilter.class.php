<?php

/**
 * Radioterapia filter form base class.
 *
 * @package    onko_gliwice
 * @subpackage filter
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRadioterapiaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'data_rozpoczecia' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dawka_fr'         => new sfWidgetFormFilterInput(),
      'dawka_total'      => new sfWidgetFormFilterInput(),
      'data_zakonczenia' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'stereo'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'gtv'              => new sfWidgetFormFilterInput(),
      'ctv'              => new sfWidgetFormFilterInput(),
      'ptv'              => new sfWidgetFormFilterInput(),
      'pacjent_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pacjent'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'data_rozpoczecia' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'dawka_fr'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'dawka_total'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'data_zakonczenia' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'stereo'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'gtv'              => new sfValidatorPass(array('required' => false)),
      'ctv'              => new sfValidatorPass(array('required' => false)),
      'ptv'              => new sfValidatorPass(array('required' => false)),
      'pacjent_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Pacjent'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('radioterapia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Radioterapia';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'data_rozpoczecia' => 'Date',
      'dawka_fr'         => 'Number',
      'dawka_total'      => 'Number',
      'data_zakonczenia' => 'Date',
      'stereo'           => 'Boolean',
      'gtv'              => 'Text',
      'ctv'              => 'Text',
      'ptv'              => 'Text',
      'pacjent_id'       => 'ForeignKey',
    );
  }
}
