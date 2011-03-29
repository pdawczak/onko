<?php

/**
 * Chemioterapia filter form base class.
 *
 * @package    onko_gliwice
 * @subpackage filter
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseChemioterapiaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'data_rozpoczecia' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'data_zakonczenia' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'lek_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Leki'), 'add_empty' => true)),
      'pacjent_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pacjent'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'data_rozpoczecia' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'data_zakonczenia' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'lek_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Leki'), 'column' => 'id')),
      'pacjent_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Pacjent'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('chemioterapia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Chemioterapia';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'data_rozpoczecia' => 'Date',
      'data_zakonczenia' => 'Date',
      'lek_id'           => 'ForeignKey',
      'pacjent_id'       => 'ForeignKey',
    );
  }
}
