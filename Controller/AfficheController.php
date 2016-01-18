<?php
namespace MiniModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\ResultSet\ResultSet;

/**
 * Class AfficheController
 *
 * @package MiniModule
 */
class AfficheController extends AbstractActionController{
    
    public function loginAction(){
        $services = $this->getServiceLocator();
        $adapter = $services->get('MiniModule\DbAdapter'); 
        $sql = 'SELECT * FROM Auth';
        $stmt = $adapter->createStatement($sql);
        $stmt->prepare();
        $result = $stmt->execute();

        $vals = array( 'logins' => array() );
        if (/*$result instanceof ResultInterface && */$result->isQueryResult()) {
           $resultSet = new ResultSet();
           $resultSet->initialize($result);
           $vm = new ViewModel();
           foreach( $resultSet as $row ) {
               array_push( $vals['logins'], $row->login );
           }
            $vm->setVariables($vals);
            //$vm->setTemplate('mini-module/affiche/login');
            return $vm;
            
        }

    }
}