<?php
class Test_Raymond_CustomtableController extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction() {
        $data = $this->getRequest()->getPost();
        $model = Mage::getModel('raymond/raymond');

        if(isset($_FILES['var_filename']['name']) && $_FILES['var_filename']['name'] != '') {
            $filename = $_FILES['var_filename']['name'];
            $filename = preg_replace('/[^A-Za-z0-9\.]/', '', mb_convert_encoding($filename, 'UTF-8', 'HTML-ENTITIES'));
            $filename = date("YmdHis").'-'.$filename;
            $filename = strtolower($filename);
            $path = Mage::getBaseDir('media') . DS. 'test' ;
            move_uploaded_file($_FILES["var_filename"]["tmp_name"],$path."/". $filename);
            $model->setData('raymond_custom_filename',$filename);
        }

        $name = $this->getRequest()->getPost('var_name');
        $color = $this->getRequest()->getPost('var_color');
        $stock = $this->getRequest()->getPost('var_stock');
        $model->setData('raymond_custom_name',$name);
        $model->setData('raymond_custom_color',$color);
        $model->setData('raymond_custom_stock',$stock);
        $model->save();
        $this->_redirect('raymond/customtable');
    }

    public function editDataAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function editAction() {
        $id     = $this->getRequest()->getParam('id');
        $model  = Mage::getModel('raymond/raymond')->load($id);
        $data = $this->getRequest()->getPost();
        if(isset($_FILES['var_filename']['name']) && $_FILES['var_filename']['name'] != '') {
            $filename = $_FILES['var_filename']['name'];
            $filename = preg_replace('/[^A-Za-z0-9\.]/', '', mb_convert_encoding($filename, 'UTF-8', 'HTML-ENTITIES'));
            $filename = date("YmdHis").'-'.$filename;
            $filename = strtolower($filename);
            $path = Mage::getBaseDir('media') . DS. 'test' ;
            move_uploaded_file($_FILES["var_filename"]["tmp_name"],$path."/". $filename);
            $model->setData('raymond_custom_filename',$filename);
        }
        $model->setData('raymond_custom_name',$data['var_name']);
        $model->setData('raymond_custom_color',$data['var_color']);
        $model->setData('raymond_custom_stock',$data['var_stock']);
        $model->save();
        $this->_redirect('raymond/customtable');
    }

    public function delDataAction() {
        $id     = $this->getRequest()->getParam('id');
        $model  = Mage::getModel('raymond/raymond')->load($id);
        $model->delete();
        $this->_redirect('raymond/customtable');
    }
}