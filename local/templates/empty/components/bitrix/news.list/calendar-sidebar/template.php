<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<ul class="calendar-list-sidebar">
<h4>Календарь</h4>
<?
$today_date = date('d.m.Y', time()); 
$start_date = date('d.m.Y', strtotime($today_date. ' - 30 days'));
$end_date = date('d.m.Y', strtotime($today_date. ' + 30 days'));

$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_date_new", "PROPERTY_date_old", "PREVIEW_TEXT");
$arFilter = Array(
    "IBLOCK_ID"=>"14", 
    ">=PROPERTY_date_new"=>ConvertDateTime($start_date, "YYYY-MM-DD"), 
    "<=PROPERTY_date_new"=>ConvertDateTime($end_date, "YYYY-MM-DD"), 
    "ACTIVE"=>"Y",
    //"PROPERTY_date"=> ConvertDateTime($today_date, "YYYY-MM-DD")
);


$res = CIBlockElement::GetList(Array("property_date_new"=>"ASC"), $arFilter, false, Array("nPageSize" => 1, /*"iNumPage" => 6*/), $arSelect);


$navString =  $res->GetPageNavStringEx($navComponentObject, "Страницы", "sidebar-calendar");
echo $navString;

while ($ob = $res->Fetch()) {
	/*echo "<pre>";
	print_r($ob);
	echo "</pre>";*/?>
	
	<div>По старому стилю: <?echo ltrim(FormatDate("d F", MakeTimeStamp($ob["PROPERTY_DATE_OLD_VALUE"])), '0');?></div>
    <div>По новому стилю: <?echo ltrim(FormatDate("d F", MakeTimeStamp($ob["PROPERTY_DATE_NEW_VALUE"])), '0');?></div>
    
	<p>
	<?if($arParams["PREVIEW_TRUNCATE_LEN"]):?>
		<?if(iconv_strlen($ob["PREVIEW_TEXT"]) > $arParams["PREVIEW_TRUNCATE_LEN"]):?>
			<?=mb_substr($ob["PREVIEW_TEXT"], 0, $arParams["PREVIEW_TRUNCATE_LEN"] ).'...'?>
		<?else:?>
			<?=$ob["PREVIEW_TEXT"];?>
		<?endif;?>
	<?else:?>
		<?=$ob["PREVIEW_TEXT"];?>
	<?endif;?>
    </p>
    <?$APPLICATION->IncludeComponent(
	"bitrix:news.detail", 
	"test", 
	array(
		"COMPONENT_TEMPLATE" => "test",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "14",
		"ELEMENT_ID" => $ob["ID"],
		"ELEMENT_CODE" => "",
		"CHECK_DATES" => "Y",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "date_new",
			1 => "date_old",
			2 => "",
		),
		"IBLOCK_URL" => "",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "N",
		"SET_CANONICAL_URL" => "N",
		"SET_BROWSER_TITLE" => "N",
		"BROWSER_TITLE" => "-",
		"SET_META_KEYWORDS" => "N",
		"META_KEYWORDS" => "-",
		"SET_META_DESCRIPTION" => "N",
		"META_DESCRIPTION" => "-",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_ELEMENT_CHAIN" => "N",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"USE_PERMISSIONS" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"USE_SHARE" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Страница",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>
<?
}
?>

</ul>
