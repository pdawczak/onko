<?php

/**
 * Badanie
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    onko_gliwice
 * @subpackage model
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Badanie extends BaseBadanie
{

  /**
   * @return boolean
   */
  public function getHasDieta()
  {
    return (boolean) ($this->getDieta()->getId() !== null);
  }

  /**
   * @return boolean
   */
  public function getHasWynikBadania()
  {
    return (boolean) ($this->getWynikBadania()->getId() !== null);
  }

}

