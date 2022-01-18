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





<?
$arFilter = array("IBLOCK_ID" => $arResult['IBLOCK_ID']);
$res = CIBlockElement::GetList(array("property_date_new"=>"ASC"),$arFilter,false,false,array('ID','NAME','DETAIL_PAGE_URL', 'PROPERTY_date_new'));
$i=0;
while ($ar = $res -> GetNext()) {
   $arNavi[$i] = $ar;
   if ($ar['ID'] == $arResult['ID']) $iCurPos = $i;
   $i++;
}
$arLink = array();
$arLink['PREVIOUS'] = isset($arNavi[$iCurPos - 1]) ? $arNavi[$iCurPos - 1] : '';
$arLink['NEXT'] = isset($arNavi[$iCurPos+1]) ? $arNavi[$iCurPos+1] : '';
?>




<div class="sidebar-calendar">
   <h4>Календарь</h4>

<div class="sidebar-calendar-pagination">
   <?
   if (is_array($arLink['PREVIOUS']))
   {
      echo '<a href="'.$arLink['PREVIOUS']['DETAIL_PAGE_URL'].'">🠔</a>';
   }?>
   <?
   if (is_array($arLink['NEXT']))
   {
      echo '<a href="'.$arLink['NEXT']['DETAIL_PAGE_URL'].'">🠖</a>';
   }?>
</div>

<div class="">По новому стилю <?=$arResult["PROPERTIES"]["date_new"]["VALUE"];?></div>
<div class="">По старому стилю <?=$arResult["PROPERTIES"]["date_old"]["VALUE"];?></div>
<div class=""><?=$arResult["PREVIEW_TEXT"];?></div>

<a href="/calendar/?ELEMENT_ID=<?=$arResult["ID"]?>">Подробнее</a>
</div>