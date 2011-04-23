<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version28 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('lokalizacja', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'nazwa' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_polish_ci',
             'charset' => 'utf8',
             ));
        $this->removeColumn('widmo', 'lokalizacja');
        $this->addColumn('widmo', 'lokalizacja_id', 'int', '8', array(
             ));
    }

    public function down()
    {
        $this->dropTable('lokalizacja');
        $this->addColumn('widmo', 'lokalizacja', 'enum', '', array(
             'values' => 
             array(
              0 => 'wz',
              1 => 'isc',
              2 => 'isp',
             ),
             ));
        $this->removeColumn('widmo', 'lokalizacja_id');
    }
}