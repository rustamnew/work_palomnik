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


if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<div class="sidebar-calendar-pagination">



	<?if ($arResult["NavPageNomer"] === 1):?>
		<div class="page-prev">
			◄
		</div>  
	<?endif?>

	<?if ($arResult["NavPageNomer"] > 1):?>

		<?if($arResult["bSavePage"]):?>
			<div class="page-prev">
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">◄</a>
			</div>
		<?else:?>
			<?if ($arResult["NavPageNomer"] > 2):?>
				<div class="page-prev">
					<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">◄</a>
				</div>
			<?else:?>
				<div class="page-prev">
					<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">◄</a>
				</div>  
			<?endif?>
		<?endif?>

	<?endif?>


	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<div class="page-next">
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">►</a>
		</div>
	<?else:?>
		<div class="page-next">
			►
		</div>
	<?endif?>


</div>
