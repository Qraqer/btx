<?php

namespace BH\Model;

use CIBlockProperty;


/**
 * Class IbAbstract
 * @package BH\Model
 *
 * @property integer $id
 * @property integer $iblockId
 * @property string $name
 */
class IbAbstract
{
    const IBLOCK_ID = 0;
    const PRIMARY_KEY = 'ID';

    public $properties;
    public $propertiesExtra;

    /**
     * @return int
     */
    public static function getIblockID()
    {
        /** @var ModelAbstract $class */
        $class = get_called_class();
        return $class::IBLOCK_ID;
    }

    /**
     * @return string
     */
    public function getPrimaryKey()
    {
        /** @var ModelAbstract $class */
        $class = get_called_class();

        return $class::PRIMARY_KEY;
    }

    /**
     * @return string
     */
    public function getModelPrimaryKey()
    {
        /** @var ModelAbstract $class */
        $class = get_called_class();

        return self::camelCase($class::PRIMARY_KEY);
    }


    /**
     * @return array
     */
    public static function getComponentPropertiesSelect()
    {
        // todo: не отрабатывает где-то на уровне вызова SQL, лучше использовать наследование в необходимых классах, как, например, в Catalog
        return array();

        /** @var IbAbstract $class */
        $class = get_called_class();

        /** @var IbAbstract $class */
        $model = new $class();

        $IBLOCK_ID = call_user_func(array($class, 'getIblockID'));

        /** @var \CPHPCache $obCache */
        $obCache = new \CPHPCache();
        $properties = array();

        /*
        if ($obCache->InitCache(0, $IBLOCK_ID, $IBLOCK_ID, 'getPropertiesSelect')) {
            $properties = $obCache->GetVars();
        } elseif ($obCache->StartDataCache()) {

            $sql = CIBlockProperty::GetList(
                array(),
                array('IBLOCK_ID' => $IBLOCK_ID)
            );

            while ($property = $sql->Fetch()) {
                $properties[] = $property['CODE'];
            }
        }*/
        $sql = CIBlockProperty::GetList(
            array(),
            array('IBLOCK_ID' => $IBLOCK_ID)
        );

        while ($property = $sql->Fetch()) {
            $properties[] = $property['CODE'];
        }

        return $properties;
    }
    /**
     * @return array
     */
    static function getPropertiesSelect()
    {
        /** @var IbAbstract $class */
        $class = get_called_class();

        /** @var IbAbstract $class */
        $model = new $class();

        $return = array();
        foreach($class::getComponentPropertiesSelect() as $property) {
            $return[] = ('PROPERTY_' . $property);
        }

        return $return;
    }

    /**
     * @return array
     */
    public static function getFullSelect()
    {
        /** @var IbAbstract $class */
        $class = get_called_class();

        /** @var IbAbstract $model */
        $model = new $class();


        return array_merge(
            $model::getBaseFieldsSelect(),
            $model::getPropertiesSelect()
        );
    }

    /**
     * @param $str
     * @param array $noStrip
     * @return mixed|null|string|string[]
     *
     * @author http://www.mendoweb.be/blog/php-convert-string-to-camelcase-string/
     */
    public static function camelCase($str, array $noStrip = [])
    {
        // non-alpha and non-numeric characters become spaces
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', strtolower($str));
        $str = trim($str);

        // uppercase the first character of each word
        $str = ucwords($str);
        $str = str_replace(" ", "", $str);
        $str = lcfirst($str);

        return $str;
    }

    /**
     * @param $arModel
     */
    public function setProperties(&$arModel)
    {
        foreach ($arModel['PROPERTIES'] as $field => $value) {
            $this->setProperty($field, $value);
        }

        unset($arModel['PROPERTIES']);
    }

    /**
     * @param $field
     * @param $value
     */
    public function setProperty($field, $value)
    {
        $camelField = self::camelCase($field);

        if (is_array($value)) {
            foreach ($value as $subField => $subValue)
                $this->propertiesExtra->{$camelField}->{self::camelCase($subField)} = $subValue;

        } else {
            // todo
        }

        $this->properties->{$camelField} = $value;
    }


    /**
     * @param $arModel
     * @param $key
     * @return string
     */
    static function createModel($arModel, $asArray = false)
    {
        /** @var ModelAbstract $class */
        $class = get_called_class();

        /** @var ModelAbstract $model */
        $model = new $class();
        $model->setProperties($arModel);

        foreach ($arModel as $field => $value) {

            if ($field[0] === '~')
                continue;

            if (strpos($field, 'PROPERTY') === 0)
                $model->setProperty($field, $value);

            $modelField = self::camelCase($field);

            if (is_array($value)) {
                foreach ($value as $subField => $subValue)
                    $model->$modelField->{self::camelCase($subField)} = $subValue;
            } else {
                $model->$modelField = $value;
            }
        }

        return $model;
    }

    /**
     * @param $arModels
     * @return array
     */
    static function createModels($arModels)
    {
        /** @var ModelAbstract $class */
        $class = get_called_class();

        /** @var ModelAbstract $model */
        $model = new $class();

        return array_map(array($class, 'createModel'), $arModels);
    }

    /**
     * @return array
     */
    static function getDefaultFilter()
    {
        return array(
            'IBLOCK_ID' => self::getIblockID(),
        );
    }

    /**
     * @return array
     */
    static function getDefaultSort()
    {
        return array(
            'SORT' => 'ASC',
            'NAME' => 'ASC'
        );
    }

    public static function getBaseFieldsSelect()
    {
        return array('ID', 'IBLOCK_ID', 'NAME', 'CODE');
    }
}
