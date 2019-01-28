<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 17:43
 */

namespace App\Politicians\Infrastructure;

use Doctrine\Common\Collections\ArrayCollection;

class DomainCollection extends ArrayCollection
{
    public function __construct(array $elements = [])
    {
        parent::__construct($elements);
    }




    public static function fromArray($items =null)
    {
        if (!is_array($items)) {
            return new self(array($items));
        }
        return new self($items);
    }

}