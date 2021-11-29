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

<div class="row">
	<div class="col-md-12">
		<div class="blog-item">
			<div class="img-box">
				<a href="<?=$arResult["DETAIL_PAGE_URL"]?>" class="open-post">
					<img class="img-fluid" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="01 Blog">
				</a>

				<?if($arResult["IBLOCK"]["CODE"] == 'projects'):?>
					<ul>
						<li>
							<?
							$res = CIBlockSection::GetByID($arResult["IBLOCK_SECTION_ID"]);
							if($ar_res = $res->GetNext()) {?>
								<a href="<?=$ar_res["SECTION_PAGE_URL"];?>"><?echo $ar_res["NAME"];?></a>
							<?}?>
						</li>
					</ul>
				<?endif;?>
			</div>
			<div class="text-box">
				<h4><?=$arResult["NAME"]?></h4>
				<p><?=$arResult["DETAIL_TEXT"]?></p>
				<?if($arResult["PROPERTIES"]["consecrate"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["consecrate"]["NAME"];?></h5>
					<p><?=$arResult["PROPERTIES"]["consecrate"]["VALUE"];?></p>
				<?endif;?>

				<?if($arResult["PROPERTIES"]["date_feast"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["date_feast"]["NAME"];?></h5>
					<p><?=$arResult["PROPERTIES"]["date_feast"]["VALUE"];?></p>
				<?endif;?>

				<?if($arResult["PROPERTIES"]["address"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["address"]["NAME"];?></h5>
					<p><?=$arResult["PROPERTIES"]["address"]["VALUE"];?></p>
				<?endif;?>

				<?if($arResult["PROPERTIES"]["phone"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["phone"]["NAME"];?></h5>
					<p><?=$arResult["PROPERTIES"]["phone"]["VALUE"];?></p>
				<?endif;?>

				<?if($arResult["PROPERTIES"]["site"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["site"]["NAME"];?></h5>
					<p><?=$arResult["PROPERTIES"]["site"]["VALUE"];?></p>
				<?endif;?>
			</div>
		</div>
	</div>
</div>