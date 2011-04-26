<?php

/**
 * WynikBadania form.
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class WynikBadaniaForm extends BaseWynikBadaniaForm
{
  public function configure()
  {
    $this->widgetSchema['badanie_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['ocena_stanu_guza'] = new sfWidgetFormChoice(array('choices' => array('wz' => 'Wznowa', 'pr' => 'Progresja', 'stg' => 'Stagnacja', 'bcg' => 'Brak cech guza')));

//  if ($this->isNew)
//  {
//    $this->widgetSchema['control_file'] = new sfWidgetFormInputFile();
//    $this->validatorSchema['control_file'] = new myControlFileParserValidator();
//    $this->widgetSchema['choord_file']  = new sfWidgetFormInputFile();
//    $this->validatorSchema['choord_file'] = new myChoordFileParserValidator();
//    $this->widgetSchema['spreadsheet_file']  = new sfWidgetFormInputFile();
//    $this->validatorSchema['spreadsheet_file'] = new mySpreadsheedFileParserValidator();
//  }
//  else
//  {
//    $this->embedRelation('Widma');
//  }
  }

  public function processValues($values)
  {
//  Widmo::setParams($values['control_file'], $values['choord_file']['wz'], $values['choord_file']['isp'], $values['choord_file']['isc']);
//  Widmo::setConcetrations($values['spreadsheet_file'], $values['choord_file']['wz'], $values['choord_file']['isp'], $values['choord_file']['isc']);
//  unset ($values['control_file']);
    return $values;
  }

  public function save($con = null)
  {
    $obj =  parent::save($con);
//  $this->values['choord_file']['wz']->setWynikId($obj->getId())->save();
//  $this->values['choord_file']['isp']->setWynikId($obj->getId())->save();
//  $this->values['choord_file']['isc']->setWynikId($obj->getId())->save();
    return $obj;
  }
}
