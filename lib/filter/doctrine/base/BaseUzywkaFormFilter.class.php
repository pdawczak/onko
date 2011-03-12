<?php

/**
 * Uzywka filter form base class.
 *
 * @package    onko_gliwice
 * @subpackage filter
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUzywkaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'badanie_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Badanie'), 'add_empty' => true)),
      'typ'        => new sfWidgetFormChoice(array('choices' => array('' => '', 'ap' => 'ap', 'bp' => 'bp', 'np' => 'np', 'aa' => 'aa', 'iu' => 'iu'))),
    ));

    $this->setValidators(array(
      'badanie_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Badanie'), 'column' => 'id')),
      'typ'        => new sfValidatorChoice(array('required' => false, 'choices' => array('ap' => 'ap', 'bp' => 'bp', 'np' => 'np', 'aa' => 'aa', 'iu' => 'iu'))),
    ));

    $this->widgetSchema->setNameFormat('uzywka_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Uzywka';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'badanie_id' => 'ForeignKey',
      'typ'        => 'Enum',
    );
  }
}
