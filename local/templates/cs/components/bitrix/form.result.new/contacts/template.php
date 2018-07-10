<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if ($arResult["isFormErrors"] == "Y") {
    echo $arResult["FORM_ERRORS_TEXT"];
}

if ($arResult["isFormNote"] != "Y") {
    echo $arResult["FORM_HEADER"]; ?>

    <?
    /***********************************************************************************
     * form questions
     ***********************************************************************************/
    ?>
    <div class="form-table data-table">

    <h5 class="text-uppercase">Обратная связь</h5>

    <?
    foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
        if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
            echo $arQuestion["HTML_CODE"];
        } else {
            ?>
            <div class="form-group <?=$FIELD_SID == 'RULES' ? 'rules-group' : '' ?>">
                <?= $arQuestion["HTML_CODE"] ?>

                <?php
                if ($FIELD_SID == 'RULES') {
                    echo BH\Frontend::getFormRules();
                }
                ?>
            </div>
            <?
        }
    }

    if ($arResult["isUseCaptcha"] == "Y") {
        ?>

        <div class="row">
            <div class="form-group col-6">
                <input type="hidden" name="captcha_sid"
                       value="<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>"/><img
                        src="/bitrix/tools/captcha.php?captcha_sid=<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>"
                        width="180" height="40"/></div>

            <div class="form-group col-6">
                <div><input required type="text" name="captcha_word" size="30" maxlength="50" value=""
                            class="inputtext form-control"/></div>
            </div>
        </div>
        <?
    } // isUseCaptcha
    ?>

    <div>

        <input <?= (intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : ""); ?>
                type="submit" name="web_form_submit" class="btn btn-large"
                value="Отправить"/>

    </div>

    <?= $arResult["FORM_FOOTER"] ?>
    <?
} //} (isFormNote)
?>