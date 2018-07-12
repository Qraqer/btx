<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 10.11.2017
 * Time: 21:26
 */

namespace BH\Model;

class Catalog extends ModelAbstract
{
    const IBLOCK_ID = 57;

    public static function getComponentPropertiesSelect()
    {
        // Родительский падает без ошибок
        // Неясно почему
        return array('POWER_HEAT', 'POWER_COOL', 'POWER_INTAKE');

    }


}