<?php

namespace App\Interfaces;

use App\Entity\Buzz;
use App\Entity\Fizz;
use App\Entity\FizzBuzz;
use App\Entity\Integer;
use Doctrine\Common\Collections\ArrayCollection;

interface HydrateTableInterface
{
    /**
     * @return ArrayCollection
     */
    function hydrate();
    
    /**
     * @param int $i
     *
     * @return Integer|Fizz|Buzz|FizzBuzz
     */
    function getEntity(int $i);
    
}