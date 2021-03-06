<?php

/**
 * ChemioterapiaTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ChemioterapiaTable extends Doctrine_Table
{

  /**
   * Returns an instance of this class.
   *
   * @return ChemioterapiaTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Chemioterapia');
  }

  /**
   *
   * @param Pacjent $pacjent
   * @return Doctrine_Collection
   */
  public function myGetSortedChemioterapieForPacjent(Pacjent $pacjent)
  {
    $q = $this
      ->createQuery('c')
      ->addWhere('c.pacjent_id = ?', $pacjent->getId())
      ->orderBy('c.data_rozpoczecia DESC')
    ;

    return $q->execute();
  }

}