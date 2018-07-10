<?php

namespace BH;

class Frontend
{
    const TEMPLATE_PATH = '/local/templates/digital/';

    public static function init()
    {
        require 'Image.php';
        require 'Morph.php';
        require 'Form.php';
        require 'Phones.php';
    }

    public static function includeArea($path)
    {
        global $APPLICATION;
        return $APPLICATION->IncludeComponent(
            'bitrix:main.include',
            '.default',
            array(
                "AREA_FILE_SHOW" => 'page',
                "AREA_FILE_SUFFIX" => 'include/' . $path,
            ),
            false
        );
    }

    public static function getJsSrc($string)
    {
        return self::TEMPLATE_PATH . 'js/' . $string;
    }

    public static function getCssSrc($string)
    {
        return self::TEMPLATE_PATH . 'css/' . $string;
    }

    /**
     * Получить список телефонов с tel:
     *
     * @param $links
     * @param string $delimeter
     * @return string
     */
    public static function getPhoneLinks($links, $delimeter = ',')
    {
        $return = array();
        if (is_array($links)) {
            foreach ($links as $link) {
                $return[] = self::getPhoneLink($link);
            }
        } elseif (is_string($links)) {
            $return[] = self::getPhoneLink($links);
        }

        return implode($delimeter, $return);
    }

    /**
     * Ссылка на телефон с tel:
     *
     * @param $link
     * @return string
     */
    public static function getPhoneLink($link)
    {
        return ('<a href="tel:' . self::clearPhone($link) . '">' . $link . '</a>');
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

    /**
     * Список ссылок mailto
     *
     * @param $links
     * @param string $delimeter
     * @return string
     */
    public static function getEmailLinks($links, $delimeter = ',')
    {
        $return = array();
        if (is_array($links)) {
            foreach ($links as $link) {
                $return[] = self::getEmailLink($link);
            }
        } elseif (is_string($links)) {
            $return[] = self::getEmailLink($links);
        }

        return implode($delimeter, $return);
    }

    /**
     * Ссылка mailto
     *
     * @param $link
     * @return string
     */
    public static function getEmailLink($link)
    {
        return ('<a href="mailto:' . $link . '">' . $link . '</a>');
    }

    public static function getFormRules()
    {
        return '<div class="form-rights">Нажимая на кнопку "Отправить" Вы подтверждаете своё согласие на <a data-type="personal" class="form-link" href="">обработку своих персональных данных</a>. <a data-type="confidenctional" class="form-link" href="">Политика конфиденциальности</a></div>';
    }

    /**
     * Зачистка телефона от всего, кроме цифр и плюса
     *
     * @param $link
     * @return null|string|string[]
     */
    public static function clearPhone($link)
    {
        return preg_replace("/[^0-9+]/", "", $link);
    }
}