<?php

/**
 * TypCechy filter form base class.
 *
 * @package    onko_gliwice
 * @subpackage filter
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTypCechyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nazwa' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'typ'   => new sfWidgetFormChoice(array('choices' => array('' => '', 'decimal' => 'decimal', 'date' => 'date', 'bool' => 'bool', 'string' => 'string'))),
      'slug'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nazwa' => new sfValidatorPass(array('required' => false)),
      'typ'   => new sfValidatorChoice(array('required' => false, 'choices' => array('decimal' => 'decimal', 'date' => 'date', 'bool' => 'bool', 'string' => 'string'))),
      'slug'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('typ_cechy_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TypCechy';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'nazwa' => 'Text',
      'typ'   => 'Enum',
      'slug'  => 'Text',
    );
  }
}
