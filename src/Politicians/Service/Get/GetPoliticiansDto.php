<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 17:41
 */

namespace App\Politicians\Service\Get;

use App\Politicians\Service\DTO\DtoInterface;

class GetPoliticiansDto implements DtoInterface
{
    private $page;
    public function __construct($page = null)
    {
        $this->page = $page;
    }

    /**
     * @return null
     */
    public function getPage()
    {
        return $this->page;
    }


}