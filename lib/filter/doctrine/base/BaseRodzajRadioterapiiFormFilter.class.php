<?php

/**
 * RodzajRadioterapii filter form base class.
 *
 * @package    onko_gliwice
 * @subpackage filter
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRodzajRadioterapiiFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'skrot' => new sfWidgetFormFilterInput(),
      'nazwa' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'skrot' => new sfValidatorPass(array('required' => false)),
      'nazwa' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rodzaj_radioterapii_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RodzajRadioterapii';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'skrot' => 'Text',
      'nazwa' => 'Text',
    );
  }
}
