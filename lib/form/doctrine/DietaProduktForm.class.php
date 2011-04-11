<?php

/**
 * DietaProdukt form.
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DietaProduktForm extends BaseDietaProduktForm
{
  public function configure()
  {
    $this->useFields(array('duza_ilosc'));
    $this->widgetSchema['duza_ilosc']->setLabel(false);
  }
}
