<?php

class WidmoWzgorze extends Widmo
{
  protected $choord_skala_ppm     = 0;
  protected $choord_widmo         = 1;
  protected $choord_linia_bazowa  = 3;
  
  public function construct()
  {
    parent::construct();
    $this->setLokalizacja('wz');
  }
}