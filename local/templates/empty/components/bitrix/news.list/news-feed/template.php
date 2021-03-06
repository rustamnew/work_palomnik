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
<?IncludeTemplateLangFile(__FILE__);?>



<?if(!$arParams["MINIMIZE_TITLE"] || $arParams["MINIMIZE_TITLE"] == "N"):?>
<section class="bolg py-100-70">
	<div class="container">
<?endif;?>
		<?if($arParams["MINIMIZE_TITLE"] == "Y"):?>
			<h4><?=$arParams["TITLE"];?></h4>
		<?else:?>
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="sec-title text-center">
						<h2><?=$arParams["NAME"]?></h2>
						<h3><?=$arParams["TITLE"];?></h3>
						<p><?=$arParams["SUBTITLE"]?></p>
					</div>
				</div>
			</div>
		<?endif;?>

		<div class="row">
			<?foreach($arResult["ITEMS"] as $arItem):?>

				<?if($arItem["TAGS"]):?>
					<?
					$string = $arItem["TAGS"];
					$string_array = explode(', ', $string);
					$string_done = "";
					$max_length = 50;

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
				

				<?if($arParams["MINIMIZE_TITLE"] == "Y"):?>
					<div class="col-md-6 col-lg-6">
				<?else:?>
					<div class="col-md-6 col-lg-4">
				<?endif;?>
				
					<div class="blog-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="img-box" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="open-post">
							
							</a>

							<?if($arItem["TAGS"]):?>
								<ul class="blog-item-tags">
									<li><a><?=$string_done?></a></li>
								</ul>
							<?endif;?>
						</div>
						<div class="text-box">
							<span class="blog-date"><?echo FormatDateFromDB($arItem["PROPERTIES"]["date"]["VALUE"], 'SHORT');?></span>
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="title-blog">
								<h5><?=$arItem["NAME"]?></h5>
							</a>
							<p><?=$arItem["PREVIEW_TEXT"]?></p>
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="link"><?echo GetMessage("READ_MORE")?></a>
						</div>
					</div>
				</div>
			<?endforeach;?>
		</div>
<?if(!$arParams["MINIMIZE_TITLE"] || $arParams["MINIMIZE_TITLE"] == "N"):?>
	</div>
</section>
<?endif;?>