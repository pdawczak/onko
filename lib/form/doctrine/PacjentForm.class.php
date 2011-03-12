<?php

/**
 * Pacjent form.
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PacjentForm extends BasePacjentForm
{
  public function configure()
  {
    $this->useFields(array('imie', 'nazwisko', 'pesel', 'data_urodzenia', 'plec', 'wzrost', 'waga', 'reka'));

    $this->widgetSchema['plec'] = new sfWidgetFormChoice(array('choices' => Pacjent::getPlecValues()));
    $this->widgetSchema['reka'] = new sfWidgetFormChoice(array('choices' => Pacjent::getRekaValues()));
    $this->widgetSchema['data_urodzenia'] = new myWidgetFormDate();

    $this->widgetSchema->setLabels(array(
      'imie'    => 'Imię',
      'reka'    => 'Ręka dominująca',
      'plec'    => 'Płeć',
      'pesel'   => 'PESEL'
    ));
  }
}
