<?php

namespace MiniModule\Model;

use Zend\Db\TableGateway\TableGateway;

 class AuthTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getAuth($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveAuth(Auth $auth)
     {
         $data = array(
             'login' => $auth->login,
             'pass'  => $auth->pass,
         );

         $id = (int) $auth->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getAuth($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('L\'id de cet authentification n\'existe pas');
             }
         }
     }

     public function deleteAlbum($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }