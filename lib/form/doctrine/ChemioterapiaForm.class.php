<?php

/**
 * Chemioterapia form.
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ChemioterapiaForm extends BaseChemioterapiaForm
{
  public function configure()
  {
    $this->useFields(array('data_rozpoczecia', 'data_zakonczenia', 'lek_id'));

    $this->validatorSchema['data_rozpoczecia']->setOption('required', true);

    $this->widgetSchema['lek_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => $this->getRelatedModelName('Lek'),
      'add_empty' => false,
      'query'     => LekTable::getInstance()->myGetLekiForChemioterapia()
    ));
  }
}
