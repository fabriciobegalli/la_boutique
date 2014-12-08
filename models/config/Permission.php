<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 12/8/2014
 * Time: 2:08 PM
 */

namespace app\models\config;


class Permission
{
    public $title;
    public $description;

    function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }
} 