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

<?if($arResult["TAGS"]):?>
<?
$string = $arResult["TAGS"];
$string_array = explode(', ', $string);
$string_done = "";
$max_length = 300;
$array_length = 0;

foreach($string_array as $item) {
	if (iconv_strlen($string_done . $item) < $max_length) {
		if ($string_done) {
			$string_done .=", " . $item;
		} else {
			$string_done .= $item;
		}
		$array_length = $array_length + 1;
	}
}

$array_tags = array_slice($string_array, 0, $array_length);
?>
<?endif;?>

<div class="row smaller-detail">
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
				<?if($arResult["IBLOCK_SECTION_ID"]):?>
					<ul class="tags-list">
						<li>
							<?$res = CIBlockSection::GetByID($arResult['IBLOCK_SECTION_ID']);?>
							<?if($ar_res = $res->GetNext()):?>
								<a style="color: #fff;" href="<?=$ar_res["SECTION_PAGE_URL"]?>">
									<?=$ar_res["NAME"]?>
								</a>
							<?endif;?>
						</li>
					</ul>
				<?endif;?>

				<h5><?=$arResult["NAME"]?></h5>
				
				<?if($arResult["PROPERTIES"]["worktime"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["worktime"]["NAME"];?></h5>
					<p><?=$arResult["PROPERTIES"]["worktime"]["VALUE"];?></p>
				<?endif;?>

				<?if($arResult["PROPERTIES"]["address"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["address"]["NAME"];?></h5>
					<p><?=$arResult["PROPERTIES"]["address"]["VALUE"];?></p>
				<?endif;?>

				<?if($arResult["PROPERTIES"]["howtoget"]["VALUE"]):?>
					<br>
					<h5><?=$arResult["PROPERTIES"]["howtoget"]["NAME"];?></h5>
					<p><?=$arResult["PROPERTIES"]["howtoget"]["VALUE"];?></p>
				<?endif;?>

				<p><?=$arResult["DETAIL_TEXT"]?></p>

				<?$resCode = CIBlock::GetByID($arResult["IBLOCK_ID"]);?>
                <?if($ar_res = $resCode->GetNext()):?>
                    
                    <?$code = "PROPERTY_".$ar_res["CODE"];?>
                    <?$condition = "=".$code;?>
                    <ul class="linked-churches">
                        <?
                        $arSelectChurch = Array("ID", "NAME", "DETAIL_PAGE_URL", $code, "PROPERTY_address","PREVIEW_PICTURE");
                        $arFilterChurch = Array(
                            "IBLOCK_ID"=>"1", 
                            $condition => $arResult["ID"], 
                            "ACTIVE"=>"Y"
                        );
                        $resChurch = CIBlockElement::GetList(Array("property_date"=>"ASC"), $arFilterChurch, false, Array("nPageSize"=>20), $arSelectChurch);
                        while($obChurch = $resChurch->GetNextElement())
                        {
                            $arFieldsChurch = $obChurch->GetFields();?>

                            <li class="linked-churches-item">
                                <div class="item-image" style="background-image: url(<?echo CFile::GetPath($arFieldsChurch["PREVIEW_PICTURE"]);?>)"></div>

                                <div class="item-content">
                                    <h6><a href="<?=$arFieldsChurch["DETAIL_PAGE_URL"]?>"><?=$arFieldsChurch["NAME"]?></a></h6>
                                    <p><?=$arFieldsChurch["PROPERTY_ADDRESS_VALUE"]?></p>
                                </div>
                            </li>
                            <?//echo '<pre>';print_r($arFieldsChurch);echo '</pre>';?>
                        <?}?>
                    </ul>
					<?if($arResult["TAGS"]):?>
						<ul class="tags-list">
						<?
						$string = $arResult["TAGS"];
						$string_array = explode(', ', $string);
						$array_tags = array_slice($string_array, 0, $array_length);
						?>
						<?foreach($array_tags as $item):?>
							<li><a ><?=$item;?></a></li>
						<?endforeach;?>	
						</ul>
					<?endif;?>
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
				
				<?if($arResult["PROPERTIES"]["show_map"]["VALUE"] == 'Y'):?>
					<h5>Карта</h5>
					<p>Координаты: <?=$arResult["PROPERTIES"]["coords"]["VALUE"]?></p>
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
