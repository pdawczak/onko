<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version20 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('chemioterapia', 'chemioterapia_lek_id_lek_id', array(
             'name' => 'chemioterapia_lek_id_lek_id',
             'local' => 'lek_id',
             'foreign' => 'id',
             'foreignTable' => 'lek',
             ));
        $this->addIndex('chemioterapia', 'chemioterapia_lek_id', array(
             'fields' => 
             array(
              0 => 'lek_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('chemioterapia', 'chemioterapia_lek_id_lek_id');
        $this->removeIndex('chemioterapia', 'chemioterapia_lek_id', array(
             'fields' => 
             array(
              0 => 'lek_id',
             ),
             ));
    }
}