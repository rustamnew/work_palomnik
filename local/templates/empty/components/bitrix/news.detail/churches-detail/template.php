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

<div class="row elemdetail">
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
					<p><a href="tel:<?=$arResult["PROPERTIES"]["phone"]["VALUE"];?>"><?=$arResult["PROPERTIES"]["phone"]["VALUE"];?></a></p>
				<?endif;?>

				<?if($arResult["PROPERTIES"]["site"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["site"]["NAME"];?></h5>
					<p><a href="<?=$arResult["PROPERTIES"]["site"]["VALUE"];?>"><?=$arResult["PROPERTIES"]["site"]["VALUE"];?></a></p>
				<?endif;?>

				<?if($arResult["PROPERTIES"]["show_map"]["VALUE"] == 'Y'):?>
					<br>
					<h5>Карта</h5>
					<?
					$coords = $arResult["PROPERTIES"]["coords"]["VALUE"];
					$coords_array = explode(', ', $coords);
					$coords1 = $coords_array[0];
					$coords2 = $coords_array[1];
					?>

					<?$APPLICATION->IncludeComponent(
						"bitrix:map.yandex.view", 
						".default", 
						array(
							"API_KEY" => "",
							"CONTROLS" => array(
								0 => "ZOOM",
								1 => "MINIMAP",
								2 => "TYPECONTROL",
								3 => "SCALELINE",
							),
							"INIT_MAP_TYPE" => "MAP",
							"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:$coords1;s:10:\"yandex_lon\";d:$coords2;s:12:\"yandex_scale\";i:15;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:$coords2;s:3:\"LAT\";d:$coords1;s:4:\"TEXT\";s:0:\"\";}}}",
							"MAP_HEIGHT" => "500",
							"MAP_ID" => "",
							"MAP_WIDTH" => "100%",
							"OPTIONS" => array(
								0 => "ENABLE_SCROLL_ZOOM",
								1 => "ENABLE_DBLCLICK_ZOOM",
								2 => "ENABLE_DRAGGING",
							),
							"COMPONENT_TEMPLATE" => ".default"
						),
						false
					);?>
				<?endif;?>
			</div>
		</div>
	</div>
</div>