<?php

class myInneUzywkiForm extends UzywkaForm
{
  public function configure()
  {
    parent::configure();
    $this->setDefault('typ', 'iu');

    $this->embedCechyCollectionForm(array('rodzaj', 'czestosc-zazywania', 'przed-badaniem', 'data-zaprzestania'), true);
  }
}