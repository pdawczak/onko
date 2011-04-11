<?php

/**
 * ProduktTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProduktTable extends Doctrine_Table
{

  /**
   * Returns an instance of this class.
   *
   * @return ProduktTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Produkt');
  }

  /**
   * @return Doctrine_Collection
   */
  public function myGetSortedProdukty()
  {
    $q = $this
      ->createQuery('p')
      ->orderBy('p.nazwa ASC')
    ;

    return $q->execute();
  }
}