<?php

class myAktywnePalenieForm extends UzywkaForm
{
  public function configure()
  {
    parent::configure();
    $this->setDefault('typ', 'ap');
    
    $this->embedCechyCollectionForm(array('ilosc-sztuk-na-dzien', 'okres-palenia', 'ostatni-papieros', 'data-zaprzestania'));
  }
}