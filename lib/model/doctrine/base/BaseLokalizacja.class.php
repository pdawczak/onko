<?php

/**
 * BaseLokalizacja
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nazwa
 * @property Doctrine_Collection $Widmo
 * 
 * @method string              getNazwa() Returns the current record's "nazwa" value
 * @method Doctrine_Collection getWidmo() Returns the current record's "Widmo" collection
 * @method Lokalizacja         setNazwa() Sets the current record's "nazwa" value
 * @method Lokalizacja         setWidmo() Sets the current record's "Widmo" collection
 * 
 * @package    onko_gliwice
 * @subpackage model
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLokalizacja extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('lokalizacja');
        $this->hasColumn('nazwa', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Widmo', array(
             'local' => 'id',
             'foreign' => 'lokalizacja_id'));
    }
}