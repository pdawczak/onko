<?php

/**
 * Pacjent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    onko_gliwice
 * @subpackage model
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Pacjent extends BasePacjent
{
  private static $plec = array('m' => 'Mężczyzna', 'k' => 'Kobieta');
  private static $reka = array('p' => 'Prawa', 'l' => 'Lewa', 'o' => 'Obóręczny');

  /**
   * @return array
   */
  static public function getPlecValues()
  {
    return self::$plec;
  }

  /**
   * @return array
   */
  static public function getRekaValues()
  {
    return self::$reka;
  }

  /**
   * @return string
   */
  public function getPlecSlowo()
  {
    return self::$plec[$this->plec];
  }

  /**
   * @return string
   */
  public function getRekaSlowo()
  {
    return self::$reka[$this->reka];
  }

  /**
   * @return Doctrine_Collection
   */
  public function getBadania()
  {
    return BadanieTable::getInstance()->myGetBadaniaSorted($this);
  }

  /**
   * @return int
   */
  public function getWiek()
  {
    return date('Y') - $this->getDateTimeObject('data_urodzenia')->format('Y');
  }

  /**
   * @return string
   */
  public function __toString()
  {
    return sprintf('%s, %s (%s l.)', $this->nazwisko, $this->imie, $this->getWiek());
  }
}
