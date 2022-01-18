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
	<?foreach($arResult["ITEMS"] as $arItem):?>

		<?if($arItem["TAGS"]):?>
			<?
			$string = $arItem["TAGS"];
			$string_array = explode(', ', $string);
			$string_done = "";
			$max_length = 60;

			foreach($string_array as $item) {
				if (iconv_strlen($string_done . $item) < $max_length) {
					if ($string_done) {
						$string_done .=", " . $item;
					} else {
						$string_done .= $item;
					}
				}
			}
			?>
		<?endif;?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>

		<div class="col-md-12" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="blog-item">
				<div class="img-box">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="open-post">
						<img class="img-fluid" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="blog">
					</a>
					<?if($arItem["TAGS"]):?>
						<ul class="blog-item-tags">
							<li><a><?=$string_done?></a></li>
						</ul>
					<?endif;?>
				</div>
				<div class="text-box">
					<?if ($arItem["PROPERTIES"]["date"]["VALUE"]):?><span class="blog-date"><?echo FormatDateFromDB($arItem["PROPERTIES"]["date"]["VALUE"], 'SHORT');?></span><?endif;?>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="title-blog">
						<h5><?=$arItem["NAME"]?></h5>
					</a>
					<p><?=$arItem["PREVIEW_TEXT"]?></p>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="link"><?echo GetMessage("READ_MORE")?></a>
				</div>
			</div>
		</div>

	<?endforeach;?>	
	
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<div class="col-md-12">
			<?=$arResult["NAV_STRING"]?>
		</div>
	<?endif;?>
</div>










