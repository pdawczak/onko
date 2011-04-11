<?php

/**
 * Dieta form.
 *
 * @package    onko_gliwice
 * @subpackage form
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DietaForm extends BaseDietaForm
{
  public function configure()
  {
    $this->useFields(array('bezmiesna', 'zroznicowana'));

    $produkty = ProduktTable::getInstance()->myGetSortedProdukty();

    foreach ($produkty as $produkt)
    {
      $tmp = new DietaProdukt();
      $tmp->setDieta($this->getObject())->setProdukt($produkt);

      $tmp_frm = new DietaProduktForm($tmp); 

      $this->embedForm($produkt->getNazwa(), $tmp_frm);
    }
  }
}
