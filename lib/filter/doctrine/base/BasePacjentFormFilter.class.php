<?php

/**
 * Pacjent filter form base class.
 *
 * @package    onko_gliwice
 * @subpackage filter
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePacjentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'imie'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nazwisko'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pesel'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'data_urodzenia' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'plec'           => new sfWidgetFormChoice(array('choices' => array('' => '', 'm' => 'm', 'k' => 'k'))),
      'wzrost'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'waga'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reka'           => new sfWidgetFormChoice(array('choices' => array('' => '', 'p' => 'p', 'l' => 'l', 'o' => 'o'))),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'imie'           => new sfValidatorPass(array('required' => false)),
      'nazwisko'       => new sfValidatorPass(array('required' => false)),
      'pesel'          => new sfValidatorPass(array('required' => false)),
      'data_urodzenia' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'plec'           => new sfValidatorChoice(array('required' => false, 'choices' => array('m' => 'm', 'k' => 'k'))),
      'wzrost'         => new sfValidatorPass(array('required' => false)),
      'waga'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'reka'           => new sfValidatorChoice(array('required' => false, 'choices' => array('p' => 'p', 'l' => 'l', 'o' => 'o'))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('pacjent_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pacjent';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'imie'           => 'Text',
      'nazwisko'       => 'Text',
      'pesel'          => 'Text',
      'data_urodzenia' => 'Date',
      'plec'           => 'Enum',
      'wzrost'         => 'Text',
      'waga'           => 'Number',
      'reka'           => 'Enum',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
