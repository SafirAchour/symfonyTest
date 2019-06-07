<?php
namespace App\Controller;

/*Check unused used statements !!!*/
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IntegerController
{
    public function integerCheck($id)
    {
        for($id = 0; $id < 100; ++$id) {
            if (is_int($id))
            {
                return $id ;
            }
        }
    }
}

