<?php

class myAlkoholForm extends UzywkaForm
{
  public function configure()
  {
    parent::configure();
    $this->setDefault('typ', 'aa');

    $this->embedCechyCollectionForm(array('jednostek-na-tydzien', 'przed-badaniem', 'data-zaprzestania'));
  }
}