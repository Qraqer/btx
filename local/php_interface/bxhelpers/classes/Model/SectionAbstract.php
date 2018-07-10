<?php
namespace BH\Model;


use Bitrix\Main\LoaderException;

abstract class SectionAbstract extends IbAbstract
{
    public static function getList(
        $filter = array(),
        $sort = array(),
        $group = false,
        $limit = false,
        $select = array()
    )
    {

        try {
            \Bitrix\Main\Loader::includeModule('iblock');
        } catch (LoaderException $e) {
            $e->getCode();
        }

        /** @var IbAbstract $class */
        $class = get_called_class();

        /** @var IbAbstract $model */
        $model = new $class();

        /** @var \CPHPCache $obCache */
        $obCache = new \CPHPCache();
        $models = array();

        /** Todo: cache system */
        if ($obCache->InitCache(0, '', __CLASS__ . __METHOD__)) {

            $models = $obCache->GetVars();

        } elseif ($obCache->StartDataCache()) {

            /** @var \CIBlockSection $CIBlockSection */
            $CIBlockSection = new \CIBlockSection();

            /** @var \CIBlockResult $sql */
            $sql = $CIBlockSection->GetList(

                /** $arOrder */
                array_merge(
                    $model::getDefaultSort(),
                    $sort
                ),

                /** $arFilter */
                array_merge(
                    $model::getDefaultFilter(),
                    $filter
                ),

                /** $arGroupBy */
                $group,

                /** $arSelectFields */
                array_merge(
                    $model::getFullSelect(),
                    $select
                ),

                /** $arNavStartParams */
                $limit
            );

            while ($arModel = $sql->Fetch()) {
                $models[$arModel['ID']] = $arModel; //self::createModel($arModel);
            }
        }

        return $models;
    }


    /**
     * @return array
     */
    static function getBaseFieldsSelect()
    {
        return array(
            'ID', 'IBLOCK_ID', 'NAME', 'CODE', 'PICTURE'
        );
    }
}