<?php

class WidmoIstotaSzaraCzolowa extends Widmo
{
  protected $choord_skala_ppm     = 8;
  protected $choord_widmo         = 9;
  protected $choord_linia_bazowa  = 11;

  public function construct()
  {
    parent::construct();
    $this->setLokalizacja('isc');
  }
}