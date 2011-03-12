<?php

class WidmoIstotaSzaraPotyliczna extends Widmo
{
  protected $choord_skala_ppm     = 4;
  protected $choord_widmo         = 5;
  protected $choord_linia_bazowa  = 7;

  public function construct()
  {
    parent::construct();
    $this->setLokalizacja('isp');
  }
}