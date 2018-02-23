<?php
class Test_Raymond_Model_Resource_Raymond extends Mage_Core_Model_Resource_Db_Abstract {
    protected function _construct() {
        $this->_init('raymond/raymond','raymond_custom_id');
    }
}