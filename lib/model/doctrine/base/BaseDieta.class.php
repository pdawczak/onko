<?php

/**
 * BaseDieta
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $badanie_id
 * @property boolean $bezmiesna
 * @property boolean $zroznicowana
 * @property Badanie $Badanie
 * @property Doctrine_Collection $DietaProdukt
 * 
 * @method integer             getBadanieId()    Returns the current record's "badanie_id" value
 * @method boolean             getBezmiesna()    Returns the current record's "bezmiesna" value
 * @method boolean             getZroznicowana() Returns the current record's "zroznicowana" value
 * @method Badanie             getBadanie()      Returns the current record's "Badanie" value
 * @method Doctrine_Collection getDietaProdukt() Returns the current record's "DietaProdukt" collection
 * @method Dieta               setBadanieId()    Sets the current record's "badanie_id" value
 * @method Dieta               setBezmiesna()    Sets the current record's "bezmiesna" value
 * @method Dieta               setZroznicowana() Sets the current record's "zroznicowana" value
 * @method Dieta               setBadanie()      Sets the current record's "Badanie" value
 * @method Dieta               setDietaProdukt() Sets the current record's "DietaProdukt" collection
 * 
 * @package    onko_gliwice
 * @subpackage model
 * @author     Paweł Dawczak pawel.dawczak@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDieta extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dieta');
        $this->hasColumn('badanie_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             ));
        $this->hasColumn('bezmiesna', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('zroznicowana', 'boolean', null, array(
             'type' => 'boolean',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Badanie', array(
             'local' => 'badanie_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('DietaProdukt', array(
             'local' => 'id',
             'foreign' => 'dieta_id'));
    }
}