<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 10.11.2017
 * Time: 21:26
 */

namespace BH\Model;

class CatalogSection extends SectionAbstract
{
    const IBLOCK_ID = 57;

    public static function getPropertiesSelect()
    {
        return array('UF_*');
    }
}