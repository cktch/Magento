<?php
$installer = $this;
$installer->startSetup();
$installer->getConnection()->addColumn(
    $this->getTable('raymondcustom'),//table name
    'raymond_custom_filename',      //column name
    'varchar(255) NOT NULL'  //datatype
);

$installer->endSetup();