<?php
class Test_Raymond_Block_Raymond extends Mage_Catalog_Block_Product_List {
    protected $_productCollection;
    protected function _getProductCollection()
    {
        if (is_null($this->_productCollection)) {
            $layer = $this->getLayer();
            $_productCollection  = Mage::getModel('catalog/product')
                ->getCollection()
                /*->addAttributeToSelect('name')
                ->addAttributeToSelect('image')
                ->getSelect()->limit(3)*/
                ->addAttributeToSelect('*')
                ->setOrder('sort_order', 'asc') // set by default to sorted the sort_order from lowest number
                ->addAttributeToSort($_GET['order'],$_GET['dir']) // to active the Set Ascending/Descending Direction, in the "Sort By".
                /*->setPageSize($this->get_prod_count())
                ->setCurPage($this->get_cur_page())*/
                ->addAttributeToFilter('sort_order', array('gt' => 0)); //display three of the products from my sort_order attribute
        }
        return $_productCollection ;
    }
}