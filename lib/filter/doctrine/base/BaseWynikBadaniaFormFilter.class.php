<?php

/**
 * WynikBadania filter form base class.
 *
 * @package    onko_gliwice
 * @subpackage filter
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseWynikBadaniaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'ocena_stanu_guza' => new sfWidgetFormChoice(array('choices' => array('' => '', 'wz' => 'wz', 'pr' => 'pr', 'stg' => 'stg', 'bcg' => 'bcg'))),
      'badanie_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Badanie'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'ocena_stanu_guza' => new sfValidatorChoice(array('required' => false, 'choices' => array('wz' => 'wz', 'pr' => 'pr', 'stg' => 'stg', 'bcg' => 'bcg'))),
      'badanie_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Badanie'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('wynik_badania_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WynikBadania';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'ocena_stanu_guza' => 'Enum',
      'badanie_id'       => 'ForeignKey',
    );
  }
}
