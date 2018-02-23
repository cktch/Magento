<?php
$installer = $this;
$installer->startSetup();
$installer->run("

    -- DROP TABLE IF EXISTS {$this->getTable('raymondcustom')};
    CREATE TABLE {$this->getTable('raymondcustom')} (
      `raymond_custom_id` int(11) NOT NULL auto_increment,
      `raymond_custom_name` varchar(255) NOT NULL default '',
      `raymond_custom_color` varchar(255) NOT NULL default '',
      `raymond_custom_stock` varchar(255) NOT NULL default '',
      PRIMARY KEY (`raymond_custom_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    // INSERT INTO `{$installer->getTable('raymondcustom')}` VALUES (1,'Name aaa','color bbb.com','stock ccc');
");
$installer->endSetup();