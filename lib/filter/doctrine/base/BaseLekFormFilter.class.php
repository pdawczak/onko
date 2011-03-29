<?php

/**
 * Lek filter form base class.
 *
 * @package    onko_gliwice
 * @subpackage filter
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLekFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nazwa_leku' => new sfWidgetFormFilterInput(),
      'rodzaj'     => new sfWidgetFormChoice(array('choices' => array('' => '', 'a' => 'a', 'c' => 'c', 'i' => 'i'))),
    ));

    $this->setValidators(array(
      'nazwa_leku' => new sfValidatorPass(array('required' => false)),
      'rodzaj'     => new sfValidatorChoice(array('required' => false, 'choices' => array('a' => 'a', 'c' => 'c', 'i' => 'i'))),
    ));

    $this->widgetSchema->setNameFormat('lek_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lek';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'nazwa_leku' => 'Text',
      'rodzaj'     => 'Enum',
    );
  }
}
