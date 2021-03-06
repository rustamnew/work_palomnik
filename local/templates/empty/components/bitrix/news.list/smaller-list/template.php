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


<ul class="smaller-list">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		
		<li class="services-section-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <?if($arItem["PREVIEW_PICTURE"]["SRC"]):?><div class="item-image" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)"></div><?endif;?>

			<div class="item-content">
				<h5><a <?if($arItem["DETAIL_TEXT"] || $arItem["PROPERTIES"]["address"]["VALUE"] || $arItem["PROPERTIES"]["gallery"]["VALUE"]):?>href="<?=$arItem["DETAIL_PAGE_URL"]?>"<?endif;?>><?=$arItem["NAME"]?></a></h5>

                <?if($arItem["IBLOCK_SECTION_ID"]):?>
                    <ul class="tags-list">
                        <li>
                            <?$res = CIBlockSection::GetByID($arItem['IBLOCK_SECTION_ID']);?>
                            <?if($ar_res = $res->GetNext()):?>
                                <a style="color: #fff;" href="<?=$ar_res["SECTION_PAGE_URL"]?>">
                                    <?=$ar_res["NAME"]?>
                                </a>
                            <?endif;?>
                        </li>
                    </ul>
                <?endif;?>
				<p><?=$arItem["PREVIEW_TEXT"]?></p>


                <?$resCode = CIBlock::GetByID($arItem["IBLOCK_ID"]);?>
                <?if($ar_res = $resCode->GetNext()):?>
                    
                    <?$code = "PROPERTY_".$ar_res["CODE"];?>
                    <?$condition = "=".$code;?>
                    
                        <?
                        $arSelectChurch = Array("ID", "NAME", "DETAIL_PAGE_URL", $code, "PROPERTY_address","PREVIEW_PICTURE");
                        $arFilterChurch = Array(
                            "IBLOCK_ID"=>"1", 
                            $condition => $arItem["ID"], 
                            "ACTIVE"=>"Y"
                        );
                        $resChurch = CIBlockElement::GetList(Array("property_date"=>"ASC"), $arFilterChurch, false, Array("nPageSize"=>20), $arSelectChurch);?>
                        <?if ($resChurch->SelectedRowsCount() != 0):?>
                            <ul class="linked-churches">
                                <?while($obChurch = $resChurch->GetNextElement())
                                {
                                    $arFieldsChurch = $obChurch->GetFields();?>

                                    <li class="linked-churches-item">
                                        <?if($arFieldsChurch["PREVIEW_PICTURE"]):?><div class="item-image linked" style="background-image: url(<?echo CFile::GetPath($arFieldsChurch["PREVIEW_PICTURE"]);?>)"></div><?endif;?>

                                        <div class="item-content">
                                            <h6><a href="<?=$arFieldsChurch["DETAIL_PAGE_URL"]?>"><?=$arFieldsChurch["NAME"]?></a></h6>
                                            <p><?=$arFieldsChurch["PROPERTY_ADDRESS_VALUE"]?></p>
                                        </div>
                                    </li>
                                    <?//echo '<pre>';print_r($arFieldsChurch);echo '</pre>';?>
                                <?}?>
                            </ul>
                        <?endif;?>
                    
                <?endif;?>

                <?if($arItem["TAGS"]):?>
                    <ul class="tags-list">
                    <?
                    $string = $arItem["TAGS"];
                    $string_array = explode(', ', $string);
                    $array_tags = array_slice($string_array, 0, $array_length);
                    ?>
                    <?foreach($array_tags as $item):?>
                        <li><a><?=$item;?></a></li>
                    <?endforeach;?>	
                    </ul>
                <?endif;?>

                <?if($arItem["DETAIL_TEXT"] || $arItem["PROPERTIES"]["address"]["VALUE"] || $arItem["PROPERTIES"]["gallery"]["VALUE"] || $arItem["DETAIL_PICTURE"]["SRC"]):?>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="smaller-list_button-detail">?????????????????? >></a>
                <?endif;?>
			</div>
		</li>
	<?endforeach;?>	
</ul>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br />

	<div class="services-pagination">
		<?=$arResult["NAV_STRING"]?>
	</div>
<?endif;?>