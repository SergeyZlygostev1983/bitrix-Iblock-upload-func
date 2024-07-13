<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Type\DateTime;

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

<? CJSCore::Init(array("jquery3")); ?>

<div class="blog">
	<h2 class="blog_title">Latest Blog Posts</h2>
	<div class="blog_subtitle">Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</div>
	<div class="posts">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="post" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="post__img">
					<?if($arItem["PREVIEW_PICTURE"]):?>
						<img border="0"
							src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
							width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
							height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
							alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
							title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/>
					<?endif?>
				</div>
				<div class="post__info">
					<?if($arItem["NAME"]):?>
						<div class="post__title"><?echo $arItem["NAME"]?></div>
					<?endif;?>
					<?if($arItem["PREVIEW_TEXT"]):?>
						<div class="post__desc"><?echo $arItem["PREVIEW_TEXT"];?></div>
					<?endif;?>
					<div class="post__bottom">
						<?if($arItem["PROPERTIES"]["USER_ID"]):?>
							<div class="post__author post__author__id-<?=$arItem["PROPERTIES"]["USER_ID"]["VALUE"]?>">
								<div class="post__author__info">
									<div class="post__author__name"><?=$arItem["PROPERTIES"]["USER_ID"]["VALUE"] == 1 ? "Joane Smith" : "John Jonas" ?></div> <!-- вывод юзверя для примера, конечно же логика будет другая, просто в примере этих данных нет -->
									<div class="post__author__position"><?=$arItem["PROPERTIES"]["USER_ID"]["VALUE"] == 1 ? "Business Solutions" : "Manager" ?></div>
								</div>
							</div>
						<?endif;?>
						<?if($arItem["DATE_CREATE"]):?>
							<div class="post__date">
								<? echo FormatDate("d M", MakeTimeStamp($arItem['DATE_CREATE'])) ?>
							</div>
						<?endif;?>
					</div>
				</div>
			</div>
		<?endforeach;?>
	</div>

	<div id="pagination">
    	<?=$arResult["NAV_STRING"]?>
	</div>
</div>
