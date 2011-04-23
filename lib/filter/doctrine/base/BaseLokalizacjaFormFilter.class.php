<?php

/**
 * Lokalizacja filter form base class.
 *
 * @package    onko_gliwice
 * @subpackage filter
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLokalizacjaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nazwa' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nazwa' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lokalizacja_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lokalizacja';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'nazwa' => 'Text',
    );
  }
}
