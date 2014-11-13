<?php

namespace APIsSilex\Client\Entity;

interface ClientInterface 
{
    function setName($name);
    
    function setEmail($email);
    
    function setCpfCnpj($cpfCnpj);
    
    function getName();
    
    function getEmail();
    
    function getCpfCnpj();
}
