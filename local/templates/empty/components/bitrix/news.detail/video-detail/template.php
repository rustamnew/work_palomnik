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


<div class="row row-video">
	<div class="col-md-12">
		<div class="blog-item">

			<iframe 
			width="100%" 
			height="450" 
			src="<?=$arResult["PROPERTIES"]["url"]["VALUE"];?>" 
			title="YouTube video player" 
			frameborder="0" 
			allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
			allowfullscreen></iframe>

			<div class="text-box">
				
				<?if($arResult["TAGS"]):?>
					<ul class="tags-list">
					<?
					$string = $arResult["TAGS"];
					$string_array = explode(', ', $string);
					$array_tags = array_slice($string_array, 0, $array_length);
					?>
					<?foreach($array_tags as $item):?>
						<li><a href="/video/?tags=<?=$item;?>"><?=$item;?></a></li>
					<?endforeach;?>	
					</ul>
				<?endif;?>

				<a class="title-blog">
					<h5><?=$arResult["NAME"]?></h5>
				</a>
				<p><?=$arResult["DETAIL_TEXT"]?></p>
			</div>
		</div>
	</div>
</div>









