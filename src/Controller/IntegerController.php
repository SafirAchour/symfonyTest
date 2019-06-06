<?php
namespace src\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IntegerController
{
    public function integerCheck($id)
    {
        for($id = 0; $id < 100; ++$id) {
            if (is_int($id))
            {
                return $id + "Buzz" ;
            }
        }
    }
}

