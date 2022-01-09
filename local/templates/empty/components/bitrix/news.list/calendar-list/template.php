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

<?
$start_date = date('d.m.Y', time());   
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
$arFilter = Array(
    "IBLOCK_ID"=>"12", 
    ">=PROPERTY_date"=>ConvertDateTime($start_date, "YYYY-MM-DD"), 
    "ACTIVE"=>"Y"
);
$res = CIBlockElement::GetList(Array("property_date"=>"ASC"), $arFilter, false, Array("nPageSize"=>20), $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    //echo '<pre>';print_r($arFields);echo '</pre>';
    ?>
        <li class="services-section-item" id="<?=$this->GetEditAreaId($arFields['ID']);?>">
			<div class="item-content">
				<h5><a href="#"><?echo ltrim(FormatDate("d F", MakeTimeStamp($arFields["PROPERTY_DATE_VALUE"])), '0');?></a></h5>

				<p><?=$arFields["NAME"]?></p>

                <ul class="linked-churches">
                    <?
                    $arSelectChurch = Array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_dates", "PROPERTY_address","PREVIEW_PICTURE");
                    $arFilterChurch = Array(
                        "IBLOCK_ID"=>"1", 
                        "=PROPERTY_dates" => $arFields["ID"], 
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

                <a href="<?=$arFields['DETAIL_PAGE_URL'];?>" class="smaller-list_button-detail">Подробнее >></a>
			</div>
		</li>
    <?
}
?>

</ul>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br />

	<div class="services-pagination">
		<?=$arResult["NAV_STRING"]?>
	</div>
<?endif;?>



