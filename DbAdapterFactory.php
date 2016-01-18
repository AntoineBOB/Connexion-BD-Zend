<?php
namespace MiniModule;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;


class DbAdapterFactory implements  FactoryInterface
{
    
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $service = $serviceLocator->get('config')['db'];
        $db = new Adapter($service);
        return $db;
    }
}