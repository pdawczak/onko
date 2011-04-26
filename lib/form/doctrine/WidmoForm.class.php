<?php

/**
 * Widmo form.
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class WidmoForm extends BaseWidmoForm
{
  public function configure()
  {
//  $this->useFields(array(
//    'id', 'skala_ppm', 'widmo', 'linia_bazowa', 
//    'widmo_bazowa', 'rozmiar_voxela_x', 'rozmiar_voxela_y',
//    'rozmiar_voxela_z', 'stezenia', 'te', 'tr', 'ns', 'wynik_id'
//  ));

    $this->useFields(array(
      'id', 'sdat', 'spar',
      'rozmiar_voxela_x', 'rozmiar_voxela_y',
      'rozmiar_voxela_z', 'stezenia', 'te', 'tr', 'ns', 'wynik_id',
      'lokalizacja_id'
    ));

    $this->widgetSchema['wynik_id'] = new sfWidgetFormInputHidden();

    $this->widgetSchema['sdat']     = new sfWidgetFormInputFile();
    $this->validatorSchema['sdat']  = new myValidatorFileContentExtractor();
    $this->widgetSchema['spar']     = new sfWidgetFormInputFile();
    $this->validatorSchema['spar']  = new myValidatorFileContentExtractor();
  }
}
