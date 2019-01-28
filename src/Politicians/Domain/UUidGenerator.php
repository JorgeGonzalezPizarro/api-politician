<?php
/**
 * Created by PhpStorm.
 * User: JorgePc
 * Date: 28/01/2019
 * Time: 14:35
 */

namespace App\Politicians\Domain;


interface UUidGenerator
{
    public function generateUUid(string $class);
}