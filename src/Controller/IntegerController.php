<?php
namespace App\Controller;

/*Check unused used statements !!!*/
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IntegerController
{
    /* Page Loading with working with lucky number generator Function
     * 
     * 
     * TO DEBUG: 
     * 
     * With $id in function argument: 
     * Could not resolve argument $id of "App\Controller\IntegerController::integercheck()",
     *  maybe you forgot to register the controller as a service or missed tagging it with the "controller.service_arguments"?
     *  
     *  
     *  With no function argument:
     *  The controller must return a "Symfony\Component\HttpFoundation\Response" object but it returned a number (0).
     */
    public function integerCheck()
    {
        for($id = 0; $id < 100; ++$id) {
            if (is_int($id))
            {
                return $id ;
            }
        }
    }
}

