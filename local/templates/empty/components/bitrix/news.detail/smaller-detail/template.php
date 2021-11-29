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
			<div class="text-box">
			<?if($arResult["TAGS"]):?>
				<ul>
					<?foreach($array_tags as $item):?>
						<li><a href="#"><?=$item;?></a></li>
					<?endforeach;?>	
				</ul>
			<?endif;?>
				<h5><?=$arResult["NAME"]?></h5>
				<p><?=$arResult["DETAIL_TEXT"]?></p>
				
			</div>
		</div>
	</div>
</div>
