<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("image", "/local/templates/empty/assets/images/banner_main/4.jpg");
$APPLICATION->SetTitle("Контакты");
?>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("image", "/local/templates/empty/assets/images/banner_main/4.jpg");
$APPLICATION->SetTitle("Контакты");
?>
<section class="flat-get-in-touch py-100">
    <div class="container">
        <div class="wrap-get-in-touch">
        <div class="contact-info">
                <h3><?=$GLOBALS['global_info']['contacts_page_info_title'];?></h3>

                <ul>
                <?if($GLOBALS['global_info']['contacts_phone_show']):?>
                    <li class="clearfix">
                        <div class="wrap-icon">
							<?$path = CFile::GetPath($GLOBALS['global_info']['contacts_page_phone_icon']);?>

							<?if (stristr($path, '.svg')):?>
								<?
								$svg_file = file_get_contents( $_SERVER["DOCUMENT_ROOT"].$path);
								print_r($svg_file);
								?>
							<?else:?>
								<?=$path?><span class="bxhtmled-surrogate-inner"><span class="bxhtmled-right-side-item-icon"></span><span class="bxhtmled-comp-lable" unselectable="on" spellcheck="false">Код PHP</span></span>&gt;
							<?endif;?>
                        </div>
                        <div class="wrap-info">
                            <h2><?=$GLOBALS['global_info']['contacts_page_phone_title'];?></h2>
                            <p class="top">
								<a href="tel:<?=$GLOBALS['global_info']['contacts_phone1'];?>"><?=$GLOBALS['global_info']['contacts_phone1'];?></a>
								<p><?=$GLOBALS['global_info']['contacts_phone1_title'];?></p>
							</p>
                            <p class="bottom">
								<a href="tel:<?=$GLOBALS['global_info']['contacts_phone2'];?>"><?=$GLOBALS['global_info']['contacts_phone2'];?></a>
								<p><?=$GLOBALS['global_info']['contacts_phone2_title'];?></p>
							</p>
                        </div>
                    </li>
                <?endif;?>

                <?if($GLOBALS['global_info']['contacts_email_show']):?>
                    <li class="clearfix">
                        <div class="wrap-icon">
							<?$path = CFile::GetPath($GLOBALS['global_info']['contacts_page_email_icon']);?>

							<?if (stristr($path, '.svg')):?>
								<?
								$svg_file = file_get_contents( $_SERVER["DOCUMENT_ROOT"].$path);
								print_r($svg_file);
								?>
							<?else:?>
								<?=$path?><span class="bxhtmled-surrogate-inner"><span class="bxhtmled-right-side-item-icon"></span><span class="bxhtmled-comp-lable" unselectable="on" spellcheck="false">Код PHP</span></span>&gt;
							<?endif;?>
                        </div>
                        <div class="wrap-info">
                            <h2><?=$GLOBALS['global_info']['contacts_page_email_title'];?></h2>
                            <p class="top"><a href="mailto:<?=$GLOBALS['global_info']['contacts_email1'];?>"><?=$GLOBALS['global_info']['contacts_email1'];?></a></p>
                            <p class="bottom"><a href="mailto:<?=$GLOBALS['global_info']['contacts_email2'];?>"><?=$GLOBALS['global_info']['contacts_email2'];?></a></p>
                        </div>
                    </li>
                <?endif;?>

                <?if($GLOBALS['global_info']['contacts_address_show']):?>
                    <li class="clearfix">
                        <div class="wrap-icon">
							<?$path = CFile::GetPath($GLOBALS['global_info']['contacts_page_address_icon']);?>

							<?if (stristr($path, '.svg')):?>
								<?
								$svg_file = file_get_contents( $_SERVER["DOCUMENT_ROOT"].$path);
								print_r($svg_file);
								?>
							<?else:?>
								<?=$path?><span class="bxhtmled-surrogate-inner"><span class="bxhtmled-right-side-item-icon"></span><span class="bxhtmled-comp-lable" unselectable="on" spellcheck="false">Код PHP</span></span>&gt;
							<?endif;?>
                        </div>
                        <div class="wrap-info">
                            <h2><?=$GLOBALS['global_info']['contacts_page_address_title'];?></h2>
                            <p class="top"><?=$GLOBALS['global_info']['contacts_address1'];?></p>
                            <p class="bottom"><?=$GLOBALS['global_info']['contacts_address2'];?></p>
                        </div>
                    </li>
                <?endif;?>
                </ul>
            </div>
            <div class="get-in-touch">
                <h2><?=$GLOBALS['global_info']['contacts_page_form_title'];?></h2>

                <?$APPLICATION->IncludeComponent(
					"bitrix:main.feedback",
					"feedback-form-contacts",
					Array(
						"COMPONENT_TEMPLATE" => ".default",
						"EMAIL_TO" => "3rustamnew3@gmail.com",
						"EVENT_MESSAGE_ID" => "",
						"OK_TEXT" => GetMessage("FORM_OK_TEXT"),
						"REQUIRED_FIELDS" => array(0=>"NAME",1=>"EMAIL",),
						"SUBMIT_TEXT" => $arItem["PROPERTIES"]["text"]["VALUE"],
						"USE_CAPTCHA" => "Y"
					)
				);?>
            </div>
        </div>

        <?
        $coords = $GLOBALS['global_info']['contacts_page_map_coords'];
        $coords_array = explode(', ', $coords);
        $coords1 = $coords_array[0];
        $coords2 = $coords_array[1];
        ?>
        <?$APPLICATION->IncludeComponent(
			"bitrix:map.yandex.view", 
			".default", 
			array(
				"API_KEY" => "",
				"COMPONENT_TEMPLATE" => ".default",
				"CONTROLS" => array(
					0 => "ZOOM",
					1 => "MINIMAP",
					2 => "TYPECONTROL",
					3 => "SCALELINE",
					4 => "SEARCH",
				),
				"INIT_MAP_TYPE" => "MAP",
				"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.681335999993806;s:10:\"yandex_lon\";d:37.293585999999955;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.293586;s:3:\"LAT\";d:55.681336;s:4:\"TEXT\";s:117:\"Епархиальная комиссия по развитию православного паломничества\";}}}",
				"MAP_HEIGHT" => "500",
				"MAP_ID" => "",
				"MAP_WIDTH" => "100%",
				"OPTIONS" => array(
					0 => "ENABLE_SCROLL_ZOOM",
					1 => "ENABLE_DBLCLICK_ZOOM",
					2 => "ENABLE_DRAGGING",
				)
			),
			false
		);?>
    </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>