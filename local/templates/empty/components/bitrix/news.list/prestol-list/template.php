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

<ul class="calendar-list">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <li class="services-section-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="item-content">
				<p class="calendar-list-prestol-date"><a href="#"><?echo ltrim(FormatDate("d F", MakeTimeStamp($arItem["PROPERTIES"]["date"]["VALUE"])), '0');?></a></p>

                <h5><?=$arItem["NAME"]?></h5>

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



                
                    <?
                    $arSelectChurch = Array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_dates", "PROPERTY_address","PREVIEW_PICTURE");
                    $arFilterChurch = Array(
                        "IBLOCK_ID"=>"1", 
                        "=PROPERTY_dates" => $arItem["ID"], 
                        "ACTIVE"=>"Y"
                    );
                    $resChurch = CIBlockElement::GetList(Array("property_date"=>"ASC"), $arFilterChurch, false, Array("nPageSize"=>20), $arSelectChurch);?>
                    <?if ($resChurch->SelectedRowsCount() != 0):?>
                        <ul class="linked-churches">
                            <?while($obChurch = $resChurch->GetNextElement())
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


<?/*echo '<pre>';print_r($arResult["ITEMS"]);echo '</pre>';*/?>