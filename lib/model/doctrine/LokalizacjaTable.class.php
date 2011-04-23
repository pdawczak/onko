<?php

/**
 * LokalizacjaTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class LokalizacjaTable extends Doctrine_Table
{

  /**
   * Returns an instance of this class.
   *
   * @return LokalizacjaTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Lokalizacja');
  }
  
  /**
   * @return Doctrine_Query
   */
  public function myGetSortedQuery()
  {
    $q = $this
      ->createQuery('l')
      ->orderBy('l.nazwa ASC')
    ;

    return $q;
  }

  /**
   * @return Doctrine_Collection
   */
  public function myGetSorted()
  {
    return $this->muGetSortedQuery();
  }
}
