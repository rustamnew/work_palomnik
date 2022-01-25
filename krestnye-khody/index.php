<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("image", "/local/templates/empty/assets/images/banner_main/4.jpg");
$APPLICATION->SetTitle("Крестные ходы");
?>


<section class="bolg py-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<?$APPLICATION->IncludeComponent(
					"bitrix:catalog.section.list", 
					"sidebar-section-list", 
					array(
						"ADD_SECTIONS_CHAIN" => "Y",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"CACHE_TIME" => "36000000",
						"CACHE_TYPE" => "A",
						"COUNT_ELEMENTS" => "N",
						"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
						"FILTER_NAME" => "sectionsFilter",
						"IBLOCK_ID" => "7",
						"IBLOCK_TYPE" => "content",
						"SECTION_CODE" => "",
						"SECTION_FIELDS" => array(
							0 => "",
							1 => "",
						),
						"SECTION_ID" => $_REQUEST["SECTION_ID"],
						"SECTION_URL" => "",
						"SECTION_USER_FIELDS" => array(
							0 => "",
							1 => "",
						),
						"SHOW_PARENT_NAME" => "N",
						"TOP_DEPTH" => "2",
						"VIEW_MODE" => "LINE",
						"TITLE" => "Благочиния",
						"LINK" => "/",
						"COMPONENT_TEMPLATE" => "sidebar-section-list"
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
						"SORT_BY1" => "date_create",
						"SORT_ORDER1" => "DESC",
						"SORT_BY2" => "SORT",
						"SORT_ORDER2" => "ASC",
						"FILTER_NAME" => "",
						"FIELD_CODE" => array(
							0 => "DATE_CREATE",
							1 => "",
						),
						"PROPERTY_CODE" => array(
							0 => "",
							1 => "",
						),
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "N",
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
						"DISPLAY_BOTTOM_PAGER" => "Y",
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
					"bitrix:news", 
					"small", 
					array(
						"COMPONENT_TEMPLATE" => "small",
						"IBLOCK_TYPE" => "content",
						"IBLOCK_ID" => "7",
						"NEWS_COUNT" => "20",
						"USE_SEARCH" => "N",
						"USE_RSS" => "N",
						"USE_RATING" => "N",
						"USE_CATEGORIES" => "N",
						"USE_FILTER" => "N",
						"SORT_BY1" => "ACTIVE_FROM",
						"SORT_ORDER1" => "DESC",
						"SORT_BY2" => "SORT",
						"SORT_ORDER2" => "ASC",
						"CHECK_DATES" => "Y",
						"SEF_MODE" => "Y",
						"SEF_FOLDER" => "/krestnye-khody/",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "36000000",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"SET_LAST_MODIFIED" => "N",
						"SET_TITLE" => "N",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"ADD_ELEMENT_CHAIN" => "N",
						"USE_PERMISSIONS" => "N",
						"STRICT_SECTION_CHECK" => "N",
						"DISPLAY_DATE" => "N",
						"DISPLAY_PICTURE" => "N",
						"DISPLAY_PREVIEW_TEXT" => "N",
						"USE_SHARE" => "N",
						"PREVIEW_TRUNCATE_LEN" => "",
						"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
						"LIST_FIELD_CODE" => array(
							0 => "TAGS",
							1 => "",
						),
						"LIST_PROPERTY_CODE" => array(
							0 => "",
							1 => "",
						),
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"DISPLAY_NAME" => "Y",
						"META_KEYWORDS" => "-",
						"META_DESCRIPTION" => "-",
						"BROWSER_TITLE" => "-",
						"DETAIL_SET_CANONICAL_URL" => "N",
						"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
						"DETAIL_FIELD_CODE" => array(
							0 => "TAGS",
							1 => "",
						),
						"DETAIL_PROPERTY_CODE" => array(
							0 => "gallery",
							1 => "",
						),
						"DETAIL_DISPLAY_TOP_PAGER" => "N",
						"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
						"DETAIL_PAGER_TITLE" => "Страница",
						"DETAIL_PAGER_TEMPLATE" => "",
						"DETAIL_PAGER_SHOW_ALL" => "N",
						"PAGER_TEMPLATE" => "bootstrap_v4",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"PAGER_TITLE" => "Новости",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"PAGER_BASE_LINK_ENABLE" => "N",
						"SET_STATUS_404" => "N",
						"SHOW_404" => "N",
						"MESSAGE_404" => "",
						"SEF_URL_TEMPLATES" => array(
							"news" => "",
							"section" => "#SECTION_CODE#/",
							"detail" => "#SECTION_CODE#/#ELEMENT_CODE#/",
						)
					),
					false
				);?>
			</div>
		</div>
	</div>
</section>










<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>