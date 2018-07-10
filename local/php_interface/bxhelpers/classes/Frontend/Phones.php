<?php

namespace BH\Frontend;

use BH\Frontend;

class Phones extends Frontend
{
    private static $instance = null;
    static $phones = array();

    const COMPANY = 'CY';

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Phones();
        }

        return self::$instance;
    }


    /**
     * @param $phones
     * @param $phonesBlock
     */
    public function addPhones($phones)
    {
        self::$phones = array_merge(self::$phones, $phones);
    }

    public function getJS()
    {
        return ('<script>window.phones = '. \Bitrix\Main\Web\Json::encode(self::$phones) .'</script>');
    }


    /**
     * Кнопка "показать телефон" со ссылкой с tel:
     *
     * @param $phone
     * @return string
     */
    public static function getPhoneBlock($phone, $id, $block)
    {
        $phone = self::clearPhone($phone);
        return ('<div class="phone" data-phone="'.$id.'" onclick="showPhone(\''.$block.'\', '.$id.');">
                    <span>'. substr($phone, 0, 4) .'</span>
                    <button class="phone-button">Показать телефон</button>
	    		</div>'
        );
    }
}