<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 27/01/2019
 * Time: 17:42
 */

namespace App\Politicians\Infrastructure\Api;

use App\Politicians\Infrastructure\DomainCollection;

class QueryController extends MainController
{


    public function getRequestParams()
    {
        return DomainCollection::fromArray($this->request->query->all());
    }


}
