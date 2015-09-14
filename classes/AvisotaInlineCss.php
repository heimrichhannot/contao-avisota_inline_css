<?php

namespace HeimrichHannot\AvisotaInlineCss;

use Avisota\Contao\Message\Core\Event\PostRenderMessageContentEvent;
use Avisota\Contao\Message\Core\Event\RenderMessageContentEvent;
use HeimrichHannot\HastePlus\DOM;
use HeimrichHannot\HastePlus\Environment;
use HeimrichHannot\HastePlus\Files;

class AvisotaInlineCss extends \Frontend
{

	const AVISOTA_CSS_MODE_INLINE = 'inline';
	const AVISOTA_CSS_MODE_HEADER = 'header';

	public static function removeExternalCss(PostRenderMessageContentEvent $objEvent)
	{
		if (Environment::getUrlBasename() != 'preview')
		{
			$strContent = $objEvent->getContent();

			// remove existing link-elements
			$doc = \phpQuery::newDocumentHTML($strContent);

			foreach (pq('html > head > link') as $link) {
				pq($link)->remove();
			}

			$objEvent->setContent($doc->htmlOuter());
		}
	}

	public static function addHeaderCss(PostRenderMessageContentEvent $objEvent)
	{
		if (Environment::getUrlBasename() != 'preview')
		{
			$arrHeaderStylesheetContents =
				static::getStylesheetContents($objEvent->getMessage()->getLayout(), static::AVISOTA_CSS_MODE_HEADER);

			if (!empty($arrHeaderStylesheetContents))
			{
				$strContent = $objEvent->getContent();

				$doc = \phpQuery::newDocumentHTML($strContent);

				pq('html > head')->append(sprintf('<style type="text/css">%s</style>', implode(' ',
					$arrHeaderStylesheetContents)));

				$objEvent->setContent($doc->htmlOuter());
			}
		}
	}

	// some mail clients can't handle margin'ed p elements :-(
	public static function convertPToBr(PostRenderMessageContentEvent $objEvent)
	{
		if (Environment::getUrlBasename() != 'preview')
		{
			$objEvent->setContent(preg_replace('@</p>[\n\r\s]*<p>@i', '<br><br>', $objEvent->getContent()));
		}
	}

	public static function convertToInlineCss(PostRenderMessageContentEvent $objEvent)
	{
		if (Environment::getUrlBasename() != 'preview')
		{
			$arrInlineStylesheetContents =
				static::getStylesheetContents($objEvent->getMessage()->getLayout(), static::AVISOTA_CSS_MODE_INLINE);

			if (!empty($arrInlineStylesheetContents))
			{
				$objEvent->setContent(DOM::convertToInlineCss($objEvent->getContent(),
					implode(' ', $arrInlineStylesheetContents)));
			}
		}
	}

	public static function getStylesheetPaths($objLayout, $strMode)
	{
		$arrStylesheets = ($strMode == static::AVISOTA_CSS_MODE_INLINE ?
		  $objLayout->getInlineStylesheets() : $objLayout->getHeaderStylesheets());

		if (!empty($arrStylesheets))
		{
			$arrStylesheetPaths = array_map(function($strUuid) {
				$strPath = TL_ROOT . '/' . Files::getPathFromUuid($strUuid);

				return (file_exists($strPath) ? $strPath : '');
			}, $arrStylesheets);

			// remove non-found stylesheets
			return array_filter($arrStylesheetPaths);
		}

		return array();
	}

	public static function getStylesheetContents($objLayout, $strMode)
	{
		return array_map('file_get_contents', static::getStylesheetPaths($objLayout, $strMode));
	}

	public static function replaceInsertTagsOnlineView(RenderMessageContentEvent $objEvent)
	{
		global $objPage;
		if ($objPage)
		{
			$strContent = $objEvent->getRenderedContent();
			$strContent = str_replace(array('%7B%7B', '%7D%7D'), array('{{', '}}'), $strContent);
			$objEvent->setRenderedContent(\Controller::replaceInsertTags($strContent));
		}
	}

}
