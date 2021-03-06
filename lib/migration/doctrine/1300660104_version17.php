<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version17 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('radioterapia', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'data_rozpoczecia' => 
             array(
              'type' => 'date',
              'length' => '25',
             ),
             'dawka_fr' => 
             array(
              'type' => 'decimal',
              'scale' => '2',
              'length' => '5',
             ),
             'dawka_total' => 
             array(
              'type' => 'decimal',
              'scale' => '2',
              'length' => '5',
             ),
             'data_zakonczenia' => 
             array(
              'type' => 'date',
              'length' => '25',
             ),
             'stereo' => 
             array(
              'type' => 'boolean',
              'length' => '25',
             ),
             'gtv' => 
             array(
              'type' => 'int',
              'length' => '',
             ),
             'ctv' => 
             array(
              'type' => 'int',
              'length' => '',
             ),
             'ptv' => 
             array(
              'type' => 'int',
              'length' => '',
             ),
             'pacjent_id' => 
             array(
              'type' => 'int',
              'length' => '8',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_polish_ci',
             'charset' => 'utf8',
             ));
    }

    public function down()
    {
        $this->dropTable('radioterapia');
    }
}