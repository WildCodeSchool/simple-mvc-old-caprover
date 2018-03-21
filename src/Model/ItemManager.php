<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 */

namespace Model;


class ItemManager extends AbstractManager
{
    const TABLE = 'item';


    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

}
