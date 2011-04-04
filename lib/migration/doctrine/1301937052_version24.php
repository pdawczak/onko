<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version24 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('dieta', 'dieta_badanie_id_badanie_id', array(
             'name' => 'dieta_badanie_id_badanie_id',
             'local' => 'badanie_id',
             'foreign' => 'id',
             'foreignTable' => 'badanie',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('dieta_produkt', 'dieta_produkt_dieta_id_dieta_id', array(
             'name' => 'dieta_produkt_dieta_id_dieta_id',
             'local' => 'dieta_id',
             'foreign' => 'id',
             'foreignTable' => 'dieta',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('dieta_produkt', 'dieta_produkt_produkt_id_produkt_id', array(
             'name' => 'dieta_produkt_produkt_id_produkt_id',
             'local' => 'produkt_id',
             'foreign' => 'id',
             'foreignTable' => 'produkt',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->addIndex('dieta', 'dieta_badanie_id', array(
             'fields' => 
             array(
              0 => 'badanie_id',
             ),
             ));
        $this->addIndex('dieta_produkt', 'dieta_produkt_dieta_id', array(
             'fields' => 
             array(
              0 => 'dieta_id',
             ),
             ));
        $this->addIndex('dieta_produkt', 'dieta_produkt_produkt_id', array(
             'fields' => 
             array(
              0 => 'produkt_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('dieta', 'dieta_badanie_id_badanie_id');
        $this->dropForeignKey('dieta_produkt', 'dieta_produkt_dieta_id_dieta_id');
        $this->dropForeignKey('dieta_produkt', 'dieta_produkt_produkt_id_produkt_id');
        $this->removeIndex('dieta', 'dieta_badanie_id', array(
             'fields' => 
             array(
              0 => 'badanie_id',
             ),
             ));
        $this->removeIndex('dieta_produkt', 'dieta_produkt_dieta_id', array(
             'fields' => 
             array(
              0 => 'dieta_id',
             ),
             ));
        $this->removeIndex('dieta_produkt', 'dieta_produkt_produkt_id', array(
             'fields' => 
             array(
              0 => 'produkt_id',
             ),
             ));
    }
}