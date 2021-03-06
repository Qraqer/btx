<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="bx-system-auth-form">

    <?
    if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
        ShowMessage($arResult['ERROR_MESSAGE']);
    ?>

    <? if ($arResult["FORM_TYPE"] == "login") { ?>

        <form name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top"
              action="<?= $arResult["AUTH_URL"] ?>">
            <?
            if ($arResult["BACKURL"] <> '') { ?>
                <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
            <? }

            foreach ($arResult["POST"] as $key => $value) { ?>
                <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
            <? } ?>

            <input type="hidden" name="AUTH_FORM" value="Y"/>
            <input type="hidden" name="TYPE" value="AUTH"/>
            <div class="container">
                <div class="row form-group">
                    <div class="col">
                        <?= GetMessage("AUTH_LOGIN") ?>:<br/>
                        <input type="text" class="form-control" name="USER_LOGIN" maxlength="50"
                               value="<?= $arResult["USER_LOGIN"] ?>"
                               size="17"/></div>
                </div>

                <div class="row form-group">
                    <div class="col">
                        <?= GetMessage("AUTH_PASSWORD") ?>:<br/>
                        <input type="password" class="form-control" name="USER_PASSWORD" maxlength="50" size="17"
                               autocomplete="off"/>

                        <?
                        if ($arResult["SECURE_AUTH"]) { ?>
                            <span class="bx-auth-secure" id="bx_auth_secure<?= $arResult["RND"] ?>" title="<?
                            echo GetMessage("AUTH_SECURE_NOTE") ?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				            </span>

                            <noscript>
                    <span class="bx-auth-secure" title="<?
                    echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
                        <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                    </span>
                            </noscript>

                            <script type="text/javascript">
                                document.getElementById('bx_auth_secure<?=$arResult["RND"]?>').style.display = 'inline-block';
                            </script>
                        <? } ?>
                    </div>
                </div>
                <?
                if ($arResult["STORE_PASSWORD"] == "Y") { ?>
                    <div class="row form-group">
                        <div class="col-2">
                            <input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y"/>
                        </div>
                        <div class="col-10"><label for="USER_REMEMBER_frm"
                                                   title="<?= GetMessage("AUTH_REMEMBER_ME") ?>"><?
                                echo GetMessage("AUTH_REMEMBER_SHORT") ?></label></div>
                    </div>
                <? } ?>
                <?
                if ($arResult["CAPTCHA_CODE"]) { ?>
                    <div class="row form-group">
                        <div class="col">
                            <?
                            echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br/>
                            <input type="hidden" name="captcha_sid" value="<?
                            echo $arResult["CAPTCHA_CODE"] ?>"/>
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<?
                            echo $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA"/><br/><br/>
                            <input type="text" name="captcha_word" maxlength="50" value=""/></div>
                    </div>
                <? } ?>

                <div class="row form-group">
                    <div class="col">
                        <input type="submit" name="Login" value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>"/>
                    </div>
                </div>
                <?
                if ($arResult["NEW_USER_REGISTRATION"] == "Y") { ?>
                <div class="row form-group">
                    <div class="col-6">
                        <noindex><a href="<?= $arResult["AUTH_REGISTER_URL"] ?>"
                                    rel="nofollow"><?= GetMessage("AUTH_REGISTER") ?></a></noindex>
                        <br/></div>

                    <? } ?>

                    <div class="col-6">
                        <noindex><a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>"
                                    rel="nofollow"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></a></noindex>
                    </div>
                </div>

                <?
                if ($arResult["AUTH_SERVICES"]) { ?>
                    <div>
                        <div>
                            <div class="bx-auth-lbl"><?= GetMessage("socserv_as_user_form") ?></div>
                            <?
                            $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "icons",
                                array(
                                    "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
                                    "SUFFIX" => "form",
                                ),
                                $component,
                                array("HIDE_ICONS" => "Y")
                            );
                            ?>
                        </div>
                    </div>
                <? } ?>
            </div>
        </form>

        <?
        if ($arResult["AUTH_SERVICES"]) { ?>
            <?
            $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
                array(
                    "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
                    "AUTH_URL" => $arResult["AUTH_URL"],
                    "POST" => $arResult["POST"],
                    "POPUP" => "Y",
                    "SUFFIX" => "form",
                ),
                $component,
                array("HIDE_ICONS" => "Y")
            );
        }
    } elseif ($arResult["FORM_TYPE"] == "otp") {
        ?>

        <form name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top"
              action="<?= $arResult["AUTH_URL"] ?>">
            <?
            if ($arResult["BACKURL"] <> '') { ?>
                <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
            <? } ?>
            <input type="hidden" name="AUTH_FORM" value="Y"/>
            <input type="hidden" name="TYPE" value="OTP"/>
            <table width="95%">
                <div>
                    <div>
                        <?
                        echo GetMessage("auth_form_comp_otp") ?><br/>
                        <input type="text" name="USER_OTP" maxlength="50" value="" size="17" autocomplete="off"/></div>
                </div>
                <?
                if ($arResult["CAPTCHA_CODE"]) { ?>
                    <div>
                        <div>
                            <?
                            echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br/>
                            <input type="hidden" name="captcha_sid" value="<?
                            echo $arResult["CAPTCHA_CODE"] ?>"/>
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<?
                            echo $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA"/><br/><br/>
                            <input type="text" name="captcha_word" maxlength="50" value=""/></div>
                    </div>
                <? } ?>
                <?
                if ($arResult["REMEMBER_OTP"] == "Y") { ?>
                    <div>
                        <div valign="top"><input type="checkbox" id="OTP_REMEMBER_frm" name="OTP_REMEMBER" value="Y"/>
                        </div>
                        <div width="100%"><label for="OTP_REMEMBER_frm" title="<?
                            echo GetMessage("auth_form_comp_otp_remember_title") ?>"><?
                                echo GetMessage("auth_form_comp_otp_remember") ?></label></div>
                    </div>
                <? } ?>
                <div>
                    <div><input type="submit" name="Login" value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>"/>
                    </div>
                </div>
                <div>
                    <div>
                        <noindex><a href="<?= $arResult["AUTH_LOGIN_URL"] ?>" rel="nofollow"><?
                                echo GetMessage("auth_form_comp_auth") ?></a></noindex>
                        <br/></div>
                </div>
            </table>
        </form>

        <?
    } else {
        ?>

        <form action="<?= $arResult["AUTH_URL"] ?>">
            <div width="95%">
                <div>
                    <div align="center">
                        <?= $arResult["USER_NAME"] ?><br/>
                        [<?= $arResult["USER_LOGIN"] ?>]<br/>
                        <a href="<?= $arResult["PROFILE_URL"] ?>"
                           title="<?= GetMessage("AUTH_PROFILE") ?>"><?= GetMessage("AUTH_PROFILE") ?></a><br/>
                    </div>
                </div>
                <div>
                    <div align="center">
                        <? foreach ($arResult["GET"] as $key => $value) { ?>
                            <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
                        <? } ?>
                        <input type="hidden" name="logout" value="yes"/>
                        <input type="submit" name="logout_butt" value="<?= GetMessage("AUTH_LOGOUT_BUTTON") ?>"/>
                    </div>
                </div>
            </div>
        </form>
    <? } ?>
</div>
