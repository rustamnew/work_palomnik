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

<section class="bolg py-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">		
				<?$APPLICATION->IncludeComponent(
	"bitrix:search.tags.cloud", 
	"news-tags", 
	array(
		"COMPONENT_TEMPLATE" => "news-tags",
		"SORT" => "NAME",
		"PAGE_ELEMENTS" => "10",
		"PERIOD" => "",
		"URL_SEARCH" => "",
		"TAGS_INHERIT" => "N",
		"CHECK_DATES" => "N",
		"FILTER_NAME" => "",
		"arrFILTER" => array(
			0 => "iblock_content",
		),
		"arrFILTER_iblock_content" => array(
			0 => "8",
		),
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"FONT_MAX" => "50",
		"FONT_MIN" => "10",
		"COLOR_NEW" => "3E74E6",
		"COLOR_OLD" => "C0C0C0",
		"PERIOD_NEW_TAGS" => "",
		"SHOW_CHAIN" => "Y",
		"COLOR_TYPE" => "Y",
		"WIDTH" => "100%",
		"TITLE" => "Теги"
	),
	false
);?>
				
				<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"news-feed-sidebar", 
	array(
		"COMPONENT_TEMPLATE" => "news-feed-sidebar",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "8",
		"NEWS_COUNT" => "3",
		"SORT_BY1" => "property_date",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "DATE_CREATE",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "date",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"TITLE" => "Лента новостей",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>
			</div>

			<div class="col-lg-8">
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"news-list",
					Array(
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"NEWS_COUNT" => $arParams["NEWS_COUNT"],
						"SORT_BY1" => $arParams["SORT_BY1"],
						"SORT_ORDER1" => $arParams["SORT_ORDER1"],
						"SORT_BY2" => $arParams["SORT_BY2"],
						"SORT_ORDER2" => $arParams["SORT_ORDER2"],
						"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
						"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
						"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
						"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
						"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
						"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
						"SET_TITLE" => $arParams["SET_TITLE"],
						"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
						"MESSAGE_404" => $arParams["MESSAGE_404"],
						"SET_STATUS_404" => $arParams["SET_STATUS_404"],
						"SHOW_404" => $arParams["SHOW_404"],
						"FILE_404" => $arParams["FILE_404"],
						"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_FILTER" => $arParams["CACHE_FILTER"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
						"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
						"PAGER_TITLE" => $arParams["PAGER_TITLE"],
						"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
						"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
						"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
						"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
						"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
						"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
						"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
						"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
						"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
						"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
						"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
						"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
						"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
						"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
						"FILTER_NAME" => $arParams["FILTER_NAME"],
						"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
						"CHECK_DATES" => $arParams["CHECK_DATES"],
					),
					$component
				);?>
			</div>
		</div>
	</div>
</section>
