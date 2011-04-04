<?php

/**
 * Dieta filter form base class.
 *
 * @package    onko_gliwice
 * @subpackage filter
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDietaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'badanie_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Badanie'), 'add_empty' => true)),
      'bezmiesna'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'zroznicowana' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'badanie_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Badanie'), 'column' => 'id')),
      'bezmiesna'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'zroznicowana' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('dieta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dieta';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'badanie_id'   => 'ForeignKey',
      'bezmiesna'    => 'Boolean',
      'zroznicowana' => 'Boolean',
    );
  }
}
