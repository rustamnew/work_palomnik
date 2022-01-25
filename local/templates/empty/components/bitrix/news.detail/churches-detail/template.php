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
			<?if($arResult["DETAIL_PICTURE"]["SRC"]):?>
				<div class="img-box">
					<a href="<?=$arResult["DETAIL_PAGE_URL"]?>" class="open-post">
						<img class="img-fluid" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="01 Blog">
					</a>
				</div>
			<?endif;?>
			<div class="text-box">
				<h5><?=$arResult["NAME"]?></h5>
				<p><?=$arResult["DETAIL_TEXT"]?></p>
		
				<?if($arResult["PROPERTIES"]["consecrate"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["consecrate"]["NAME"];?></h5>
					<p><?=$arResult["PROPERTIES"]["consecrate"]["VALUE"];?></p>
				<?endif;?>

				<?if($arResult["PROPERTIES"]["prayers"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["prayers"]["NAME"];?></h5>
					<p><?=$arResult["PROPERTIES"]["prayers"]["VALUE"];?></p>
				<?endif;?>

				<?if($arResult["PROPERTIES"]["night"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["night"]["NAME"];?></h5>
					<p><?=$arResult["PROPERTIES"]["night"]["VALUE"];?></p>
				<?endif;?>

				<?if($arResult["PROPERTIES"]["fonts_mass"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["fonts_mass"]["NAME"];?></h5>
					<p><?=$arResult["PROPERTIES"]["fonts_mass"]["VALUE"];?></p>
				<?endif;?>

				<?if($arResult["PROPERTIES"]["address"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["address"]["NAME"];?></h5>
					<p><?=$arResult["PROPERTIES"]["address"]["VALUE"];?></p>
				<?endif;?>

				<?if($arResult["PROPERTIES"]["phone"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["phone"]["NAME"];?></h5>
					<?foreach($arResult["PROPERTIES"]["phone"]["VALUE"] as $arItem):?>
						<p><a href="tel:<?=$arItem;?>"><?=$arItem;?></a></p>
					<?endforeach;?>
					
				<?endif;?>

				<?if($arResult["PROPERTIES"]["social"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["social"]["NAME"];?></h5>
					<?foreach($arResult["PROPERTIES"]["social"]["VALUE"] as $arItem):?>
						<p><a href="<?=$arItem;?>"><?=$arItem;?></a></p>
					<?endforeach;?>
				<?endif;?>

				<?if($arResult["PROPERTIES"]["site"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["site"]["NAME"];?></h5>
					<?foreach($arResult["PROPERTIES"]["site"]["VALUE"] as $arItem):?>
						<p><a href="<?=$arItem;?>"><?=$arItem;?></a></p>
					<?endforeach;?>
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

				<div class="linked-items">
					<?if($arResult["PROPERTIES"]["fonts"]["VALUE"]):?>
						<br>
						<h5><?=$arResult["PROPERTIES"]["fonts"]["NAME"];?></h5>

						<div class="linked-items-list">
							<?foreach($arResult["PROPERTIES"]["fonts"]["VALUE"] as $itemId):?>
								<?
								$res = CIBlockElement::GetByID($itemId);
								if($ar_res = $res->GetNext()) {?>
									<li class="services-section-item">
										<?if($ar_res["PREVIEW_PICTURE"]):?><div class="item-image" style="background-image: url(<?echo CFile::GetPath($ar_res["PREVIEW_PICTURE"]);?>)"></div><?endif;?>
										<div class="item-content">
											<h5><a <?if($ar_res["DETAIL_TEXT"]):?>href="<?=$ar_res["DETAIL_PAGE_URL"];?>"<?endif;?>><?=$ar_res["NAME"];?></a></h5>

											<?if($ar_res["TAGS"]):?>
												<ul class="tags-list">
												<?
												$string = $ar_res["TAGS"];
												$string_array = explode(', ', $string);
												$array_tags = array_slice($string_array, 0, $array_length);
												?>
												<?foreach($array_tags as $item):?>
													<li><a><?=$item;?></a></li>
												<?endforeach;?>	
												</ul>
											<?endif;?>

											<p><?=$ar_res["PREVIEW_TEXT"];?></p>

											<a href="<?=$ar_res["DETAIL_PAGE_URL"];?>" class="smaller-list_button-detail">Подробнее &gt;&gt;</a>
										</div>
									</li>
								<?}?>
							<?endforeach;?>
						</div>
					<?endif;?>

					<?if($arResult["PROPERTIES"]["krestnye"]["VALUE"]):?>
						<br>
						<h5><?=$arResult["PROPERTIES"]["krestnye"]["NAME"];?></h5>
						<div class="linked-items-list">
							<?foreach($arResult["PROPERTIES"]["krestnye"]["VALUE"] as $itemId):?>
								<?
								$res = CIBlockElement::GetByID($itemId);
								if($ar_res = $res->GetNext()) {?>
									<li class="services-section-item">
										<?if($ar_res["PREVIEW_PICTURE"]):?><div class="item-image" style="background-image: url(<?echo CFile::GetPath($ar_res["PREVIEW_PICTURE"]);?>)"></div><?endif;?>
										<div class="item-content">
										<h5><a <?if($ar_res["DETAIL_TEXT"]):?>href="<?=$ar_res["DETAIL_PAGE_URL"];?>"<?endif;?>><?=$ar_res["NAME"];?></a></h5>
											<p><?=$ar_res["PREVIEW_TEXT"];?></p>

											<?if($ar_res["DETAIL_TEXT"]):?>
												<a href="<?=$ar_res["DETAIL_PAGE_URL"]?>" class="smaller-list_button-detail">Подробнее >></a>
											<?endif;?>
										</div>
									</li>
								<?}?>
							<?endforeach;?>
						</div>
					<?endif;?>

					<?if($arResult["PROPERTIES"]["svyatyni"]["VALUE"]):?>
						<br>
						<h5><?=$arResult["PROPERTIES"]["svyatyni"]["NAME"];?></h5>
						<div class="linked-items-list">
							<?foreach($arResult["PROPERTIES"]["svyatyni"]["VALUE"] as $itemId):?>
								<?
								$res = CIBlockElement::GetByID($itemId);
								if($ar_res = $res->GetNext()) {?>
									<li class="services-section-item">
										<?if($ar_res["PREVIEW_PICTURE"]):?><div class="item-image" style="background-image: url(<?echo CFile::GetPath($ar_res["PREVIEW_PICTURE"]);?>)"></div><?endif;?>
										<div class="item-content">
										<h5><a <?if($ar_res["DETAIL_TEXT"]):?>href="<?=$ar_res["DETAIL_PAGE_URL"];?>"<?endif;?>><?=$ar_res["NAME"];?></a></h5>
											<p><?=$ar_res["PREVIEW_TEXT"];?></p>

											<?if($ar_res["DETAIL_TEXT"]):?>
												<a href="<?=$ar_res["DETAIL_PAGE_URL"]?>" class="smaller-list_button-detail">Подробнее >></a>
											<?endif;?>
										</div>
									</li>
								<?}?>
							<?endforeach;?>
						</div>
					<?endif;?>

					<?if($arResult["PROPERTIES"]["graves"]["VALUE"]):?>
						<br>
						<h5><?=$arResult["PROPERTIES"]["graves"]["NAME"];?></h5>
						<div class="linked-items-list">
							<?foreach($arResult["PROPERTIES"]["graves"]["VALUE"] as $itemId):?>
								<?
								$res = CIBlockElement::GetByID($itemId);
								if($ar_res = $res->GetNext()) {?>
									<li class="services-section-item">
										<?if($ar_res["PREVIEW_PICTURE"]):?><div class="item-image" style="background-image: url(<?echo CFile::GetPath($ar_res["PREVIEW_PICTURE"]);?>)"></div><?endif;?>
										<div class="item-content">
										<h5><a <?if($ar_res["DETAIL_TEXT"]):?>href="<?=$ar_res["DETAIL_PAGE_URL"];?>"<?endif;?>><?=$ar_res["NAME"];?></a></h5>
											<p><?=$ar_res["PREVIEW_TEXT"];?></p>

											<?if($ar_res["DETAIL_TEXT"]):?>
												<a href="<?=$ar_res["DETAIL_PAGE_URL"]?>" class="smaller-list_button-detail">Подробнее >></a>
											<?endif;?>
										</div>
									</li>
								<?}?>
							<?endforeach;?>
						</div>
					<?endif;?>

					<?if($arResult["PROPERTIES"]["novomuch"]["VALUE"]):?>
						<br>
						<h5><?=$arResult["PROPERTIES"]["novomuch"]["NAME"];?></h5>
						<div class="linked-items-list">
							<?foreach($arResult["PROPERTIES"]["novomuch"]["VALUE"] as $itemId):?>
								<?
								$res = CIBlockElement::GetByID($itemId);
								if($ar_res = $res->GetNext()) {?>
									<li class="services-section-item">
										<?if($ar_res["PREVIEW_PICTURE"]):?><div class="item-image" style="background-image: url(<?echo CFile::GetPath($ar_res["PREVIEW_PICTURE"]);?>)"></div><?endif;?>
										<div class="item-content">
											<h5><a <?if($ar_res["DETAIL_TEXT"]):?>href="<?=$ar_res["DETAIL_PAGE_URL"];?>"<?endif;?>><?=$ar_res["NAME"];?></a></h5>
											<p><?=$ar_res["PREVIEW_TEXT"];?></p>

											<?if($ar_res["DETAIL_TEXT"]):?>
												<a href="<?=$ar_res["DETAIL_PAGE_URL"]?>" class="smaller-list_button-detail">Подробнее >></a>
											<?endif;?>
										</div>
									</li>
								<?}?>
							<?endforeach;?>
						</div>
					<?endif;?>

					<?if($arResult["PROPERTIES"]["dates"]["VALUE"]):?>
						<br>
						<h5><?=$arResult["PROPERTIES"]["dates"]["NAME"];?></h5>
						<div class="linked-items-list">
							<?foreach($arResult["PROPERTIES"]["dates"]["VALUE"] as $itemId):?>
								<?
								$arFilter = array(
									"ID" => $itemId,
									"ACTIVE" => "Y",
								);
								$arSelect = Array(
									"ID", 
									"NAME", 
									"PROPERTY_date",
									"PROPERTY_title",
									"PREVIEW_TEXT",
									"DETAIL_TEXT",
									"DETAIL_PAGE_URL",
									"PREVIEW_PICTURE"
								);
								$res = CIBlockElement::GetList(Array("property_date"=>"ASC"), $arFilter, false, false, $arSelect);
							
								while($ob = $res->GetNextElement()) {
									$ar_res = $ob->GetFields();?>
									<li class="services-section-item">
										<?if($ar_res["PREVIEW_PICTURE"]):?><div class="item-image" style="background-image: url(<?echo CFile::GetPath($ar_res["PREVIEW_PICTURE"]);?>)"></div><?endif;?>
										<div class="item-content">
											<h5><a <?if($ar_res["DETAIL_TEXT"]):?>href="<?=$ar_res["DETAIL_PAGE_URL"];?>"<?endif;?>><?=$ar_res["PROPERTY_TITLE_VALUE"];?></a></h5>
											<p><?echo ltrim(FormatDate("d F", MakeTimeStamp($ar_res["PROPERTY_DATE_VALUE"])), '0');?></p>
											<p><?=$ar_res["PREVIEW_TEXT"];?></p>

											<?if($ar_res["DETAIL_TEXT"]):?>
												<a href="<?=$ar_res["DETAIL_PAGE_URL"]?>" class="smaller-list_button-detail">Подробнее >></a>
											<?endif;?>
										</div>
									</li>
								<?}?>

								<?/*
								$res = CIBlockElement::GetByID($itemId);
								if($ar_res = $res->GetNext()) {?>
									<li class="services-section-item">
										<?if($ar_res["PREVIEW_PICTURE"]):?><div class="item-image" style="background-image: url(<?echo CFile::GetPath($ar_res["PREVIEW_PICTURE"]);?>)"></div><?endif;?>
										<div class="item-content">
											<h5><a <?if($ar_res["DETAIL_TEXT"]):?>href="<?=$ar_res["DETAIL_PAGE_URL"];?>"<?endif;?>><?=$ar_res["NAME"];?></a></h5>
											<p><?=$ar_res["PREVIEW_TEXT"];?></p>

											<?if($ar_res["DETAIL_TEXT"]):?>
												<a href="<?=$ar_res["DETAIL_PAGE_URL"]?>" class="smaller-list_button-detail">Подробнее >></a>
											<?endif;?>
										</div>
									</li>
								<?}*/?>
							<?endforeach;?>
						</div>
					<?endif;?>

					<?if($arResult["PROPERTIES"]["gallery"]["VALUE"]):?>
						<br>
						<h5><?=$arResult["PROPERTIES"]["gallery"]["NAME"];?></h5>
						<div class="gallery-church">
							<?foreach($arResult["PROPERTIES"]["gallery"]["VALUE"] as $arItemGallery):?>
								<a data-fancybox="church-gallery" href="<?echo CFile::GetPath($arItemGallery);?>">
									<img src="<?echo CFile::GetPath($arItemGallery);?>" alt="test">
								</a>
							<?endforeach;?>
						</div>
					<?endif;?>
				</div>
			</div>
		</div>
	</div>
</div>