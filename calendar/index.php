<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Календарь");
?>

<?if ($_REQUEST["ELEMENT_ID"]):?>
	<?$id = $_REQUEST["ELEMENT_ID"];?>
<?else:?>

	<?
	$today_date = date('d.m.Y', time());
	$arSelect = Array("ID", "NAME", /*"PROPERTY_dates"*/);
	$arFilter = Array(
		"IBLOCK_ID"=>"14", 
		"=PROPERTY_date_new" => ConvertDateTime($today_date, "YYYY-MM-DD"),
		"ACTIVE"=>"Y"
	);
	$res = CIBlockElement::GetList(Array("property_date_new"=>"ASC"), $arFilter, false, Array("nPageSize" => 1), $arSelect);
	if ($ob = $res->Fetch()):?>
		<?$id = $ob["ID"];?>
	<?endif;?>
<?endif;?>


<?$APPLICATION->IncludeComponent(
	"bitrix:news.detail", 
	"calendar-detail", 
	array(
		"COMPONENT_TEMPLATE" => "calendar-detail",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "14",
		"ELEMENT_ID" => $id,
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
		"AJAX_MODE" => "N",
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
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"USE_SHARE" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Страница",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>