<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 10.11.2017
 * Time: 0:10
 */

namespace BH\Model;

use Bitrix\Main\DB\Exception;
use Bitrix\Main\LoaderException;
use CIBlock;
use CIBlockProperty;

/**
 * Class ModelAbstract
 * @package BH\Model
 *
 * @property string $detailPageUrl
 * @property string $editLink
 * @property \stdClass $previewPicture
 */
abstract class ModelAbstract extends IbAbstract
{
    /**
     * @param array $filter
     * @param array $sort
     * @param bool $group
     * @param array $limit
     * @param array $select
     * @return array
     * @throws \Bitrix\Main\LoaderException
     */
    public static function getList(
        $filter = array(),
        $sort = array(),
        $group = false,
        $limit = array(),
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

            /** @var \CIBlockElement $CIBlockElement */
            $CIBlockElement = new \CIBlockElement();

            /** @var \CIBlockResult $sql */
            $sql = $CIBlockElement->GetList(

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

                /** $arNavStartParams */
                $limit,

                /** $arSelectFields */
                array_merge(
                    $model::getFullSelect(),
                    $select
                )
            );

            while ($arModel = $sql->Fetch()) {
                $models[$arModel['ID']] = $arModel; //self::createModel($arModel);
            }
        }

        return $models;
    }

    /**
     * @param \CBitrixComponentTemplate $component
     */
    public function getEditLink(\CBitrixComponentTemplate $component)
    {
        $component->AddEditAction($this->id, $this->editLink,
            CIBlock::GetArrayByID($this->iblockId, 'ELEMENT_EDIT')
        );
    }


    /**
     * @return array
     */
    static function getBaseFieldsSelect()
    {
        return array(
            'ID', 'IBLOCK_ID', 'NAME', 'CODE', 'PREVIEW_TEXT', 'DETAIL_TEXT', 'PREVIEW_PICTURE', 'DETAIL_PICTURE'
        );
    }

}