<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version27 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('radioterapia', 'radioterapia_rodzaj_radioterapii_id_rodzaj_radioterapii_id', array(
             'name' => 'radioterapia_rodzaj_radioterapii_id_rodzaj_radioterapii_id',
             'local' => 'rodzaj_radioterapii_id',
             'foreign' => 'id',
             'foreignTable' => 'rodzaj_radioterapii',
             'onUpdate' => '',
             'onDelete' => 'SET NULL',
             ));
        $this->addIndex('radioterapia', 'radioterapia_rodzaj_radioterapii_id', array(
             'fields' => 
             array(
              0 => 'rodzaj_radioterapii_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('radioterapia', 'radioterapia_rodzaj_radioterapii_id_rodzaj_radioterapii_id');
        $this->removeIndex('radioterapia', 'radioterapia_rodzaj_radioterapii_id', array(
             'fields' => 
             array(
              0 => 'rodzaj_radioterapii_id',
             ),
             ));
    }
}