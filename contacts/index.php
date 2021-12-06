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
							<?$path = CFile::GetPath($arItem['PROPERTIES']['icon_phone']['VALUE']);?>

							<?if (stristr($path, '.svg')):?>
								<?
								$img_file = $path;

								$svg = new SimpleXMLElement( file_get_contents( $_SERVER["DOCUMENT_ROOT"].$img_file));
								if($svg['id']){
									$img_grup = $img_file.'#'.$svg['id'];
								}

								$svg_file = file_get_contents( $_SERVER["DOCUMENT_ROOT"].$img_file);
								print_r($svg_file);?>
							<?else:?>
								<img src=<?=$path?>>
							<?endif;?>
                        </div>
                        <div class="wrap-info">
                            <h2><?=$GLOBALS['global_info']['contacts_page_phone_title'];?></h2>
                            <p class="top"><a href="tel:<?=$GLOBALS['global_info']['contacts_phone1'];?>"><?=$GLOBALS['global_info']['contacts_phone1'];?></a></p>
                            <p class="bottom"><a href="tel:<?=$GLOBALS['global_info']['contacts_phone2'];?>"><?=$GLOBALS['global_info']['contacts_phone2'];?></a></p>
                        </div>
                    </li>
                <?endif;?>

                <?if($GLOBALS['global_info']['contacts_email_show']):?>
                    <li class="clearfix">
                        <div class="wrap-icon">
							<?$path = CFile::GetPath($arItem['PROPERTIES']['icon_email']['VALUE']);?>

							<?if (stristr($path, '.svg')):?>
								<?
								$img_file = $path;

								$svg = new SimpleXMLElement( file_get_contents( $_SERVER["DOCUMENT_ROOT"].$img_file));
								if($svg['id']){
									$img_grup = $img_file.'#'.$svg['id'];
								}

								$svg_file = file_get_contents( $_SERVER["DOCUMENT_ROOT"].$img_file);
								print_r($svg_file);?>
							<?else:?>
								<img src=<?=$path?>>
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
							<?$path = CFile::GetPath($arItem['PROPERTIES']['icon_address']['VALUE']);?>

							<?if (stristr($path, '.svg')):?>
								<?
								$img_file = $path;

								$svg = new SimpleXMLElement( file_get_contents( $_SERVER["DOCUMENT_ROOT"].$img_file));
								if($svg['id']){
									$img_grup = $img_file.'#'.$svg['id'];
								}

								$svg_file = file_get_contents( $_SERVER["DOCUMENT_ROOT"].$img_file);
								print_r($svg_file);?>
							<?else:?>
								<img src=<?=$path?>>
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

                <?$APPLICATION->IncludeComponent("bitrix:main.feedback", "feedback-form-contacts", Array(
						"COMPONENT_TEMPLATE" => ".default",
							"USE_CAPTCHA" => "Y",
							"OK_TEXT" => GetMessage("FORM_OK_TEXT"),
							"EMAIL_TO" => "3rustamnew3@gmail.com",	
							"REQUIRED_FIELDS" => array(	
								0 => "NAME",
								1 => "EMAIL",
							),
							"EVENT_MESSAGE_ID" => "",
							"SUBMIT_TEXT" => $arItem["PROPERTIES"]["text"]["VALUE"],
						),
						false
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
            "",
            Array(
                "API_KEY" => "",
                "CONTROLS" => array("ZOOM","MINIMAP","TYPECONTROL","SCALELINE"),
                "INIT_MAP_TYPE" => "MAP",
                "MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:$coords1;s:10:\"yandex_lon\";d:$coords2;s:12:\"yandex_scale\";i:15;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:$coords2;s:3:\"LAT\";d:$coords1;s:4:\"TEXT\";s:0:\"\";}}}",
                "MAP_HEIGHT" => "500",
                "MAP_ID" => "",
                "MAP_WIDTH" => "100%",
                "OPTIONS" => array("ENABLE_SCROLL_ZOOM","ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING")
            )
        );?>
    </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>