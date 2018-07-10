<?
namespace BH\Model;

class Company extends ModelAbstract
{
    const IBLOCK_ID = 62;

    public static function getComponentPropertiesSelect()
    {
        return array('CITY', 'ADDRESS', 'YEAR', 'PHONE', 'TYPE', 'RATING');
    }
}