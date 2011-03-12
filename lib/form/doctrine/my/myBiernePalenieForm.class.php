<?php

class myBiernePalenieForm extends UzywkaForm
{
  public function configure()
  {
    parent::configure();
    $this->setDefault('typ', 'bp');

    $this->embedCechyCollectionForm(array('miejsce-narazenia', 'czas-ekspozycji', 'przed-badaniem'));
  }
}