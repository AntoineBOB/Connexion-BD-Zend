<?php
namespace MiniModule\Form\Element;

use Zend\Form\Element;
use Zend\InputFilter\InputProviderInterface;

class VerificationPassword extends Element\Password implements InputProviderInterface
{
    public function __construct()
    {
        $options = array(
            'label' => 'Mot de passe : ',
        );
        parent::__construct('verifmdp', $options);
        $this->setAttribute( 'size', 12 );
    }

    public function getInputSpecification()
    {
        return array(
            'required' => true,
        );
    }
    public function isEmpty(){
        if($this->getLabel()==""){
            return true;
        }
    }
}