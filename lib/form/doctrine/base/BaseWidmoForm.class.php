<?php

/**
 * Widmo form base class.
 *
 * @method Widmo getObject() Returns the current form's model object
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWidmoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'skala_ppm'        => new sfWidgetFormTextarea(),
      'widmo'            => new sfWidgetFormTextarea(),
      'linia_bazowa'     => new sfWidgetFormTextarea(),
      'widmo_bazowa'     => new sfWidgetFormTextarea(),
      'lokalizacja_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Lokalizacja'), 'add_empty' => true)),
      'rozmiar_voxela_x' => new sfWidgetFormInputText(),
      'rozmiar_voxela_y' => new sfWidgetFormInputText(),
      'rozmiar_voxela_z' => new sfWidgetFormInputText(),
      'stezenia'         => new sfWidgetFormTextarea(),
      'te'               => new sfWidgetFormInputText(),
      'tr'               => new sfWidgetFormInputText(),
      'ns'               => new sfWidgetFormInputText(),
      'wynik_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('WynikBadania'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'skala_ppm'        => new sfValidatorString(array('required' => false)),
      'widmo'            => new sfValidatorString(array('required' => false)),
      'linia_bazowa'     => new sfValidatorString(array('required' => false)),
      'widmo_bazowa'     => new sfValidatorString(array('required' => false)),
      'lokalizacja_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Lokalizacja'), 'required' => false)),
      'rozmiar_voxela_x' => new sfValidatorNumber(),
      'rozmiar_voxela_y' => new sfValidatorNumber(),
      'rozmiar_voxela_z' => new sfValidatorNumber(),
      'stezenia'         => new sfValidatorString(array('required' => false)),
      'te'               => new sfValidatorInteger(array('required' => false)),
      'tr'               => new sfValidatorInteger(array('required' => false)),
      'ns'               => new sfValidatorInteger(array('required' => false)),
      'wynik_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('WynikBadania'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('widmo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Widmo';
  }

}
