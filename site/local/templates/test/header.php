<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?><? use Bitrix\Main\Page\Asset; ?>
<!DOCTYPE html>
<html>
<head>
    <?
    //region ADD CSS
    $arCSS = [];
    foreach ($arCSS as $css) {
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . $css);
    }
    //endregion

    //region ADD JS
    $arJS = [];

    $linksJS = [];

    foreach ($arJS as $js) {
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . $js);
    }

    foreach ($linksJS as $link) {
        Asset::getInstance()->addJs($link);
    }
    //endregion

    //CJSCore::Init(array("jquery"));
    ?>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


    <? $APPLICATION->ShowHead(); ?>
</head>

<body>

<? $APPLICATION->ShowPanel(); ?>

