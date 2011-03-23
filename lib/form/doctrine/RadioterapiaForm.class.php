<?php

/**
 * Radioterapia form.
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RadioterapiaForm extends BaseRadioterapiaForm
{
  public function configure()
  {
    $this->useFields(array(
      'data_rozpoczecia', 'dawka_fr', 'dawka_total', 'data_zakonczenia',
      'stereo', 'gtv', 'ctv', 'ptv'
    ));

    $this->validatorSchema['data_rozpoczecia']->setOption('required', true);
    $this->validatorSchema['dawka_fr']->setOption('required', true);
    $this->validatorSchema['dawka_total']->setOption('required', true);

    $this->validatorSchema['gtv'] = new sfValidatorNumber(array('required' => true));
    $this->validatorSchema['ctv'] = new sfValidatorNumber(array('required' => true));
    $this->validatorSchema['ptv'] = new sfValidatorNumber(array('required' => true));
  }
}
