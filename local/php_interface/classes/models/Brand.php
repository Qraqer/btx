<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 10.11.2017
 * Time: 21:29
 */

namespace BH\Model;


class Brand extends ModelAbstract
{
    const IBLOCK_ID = 61;

    static function getComponentPropertiesSelect()
    {
        return array('COUNTRY', 'ADDRESS', 'YEAR', 'PHONE', 'TYPE', 'RATING', 'DIRECTIONS', 'SEO');
    }
}