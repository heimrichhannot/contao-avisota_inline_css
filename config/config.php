<?php

$GLOBALS['TL_EVENTS'][\Avisota\Contao\Message\Core\Event\AvisotaMessageEvents::POST_RENDER_MESSAGE_CONTENT]['removeExternalCss'] =
	array('\HeimrichHannot\AvisotaInlineCss\AvisotaInlineCss', 'removeExternalCss');

$GLOBALS['TL_EVENTS'][\Avisota\Contao\Message\Core\Event\AvisotaMessageEvents::POST_RENDER_MESSAGE_CONTENT]['addHeaderCss'] =
	array('\HeimrichHannot\AvisotaInlineCss\AvisotaInlineCss', 'addHeaderCss');

$GLOBALS['TL_EVENTS'][\Avisota\Contao\Message\Core\Event\AvisotaMessageEvents::POST_RENDER_MESSAGE_CONTENT]['convertPToBr'] =
	array('\HeimrichHannot\AvisotaInlineCss\AvisotaInlineCss', 'convertPToBr');

$GLOBALS['TL_EVENTS'][\Avisota\Contao\Message\Core\Event\AvisotaMessageEvents::POST_RENDER_MESSAGE_CONTENT]['convertToInlineCss'] =
	array('\HeimrichHannot\AvisotaInlineCss\AvisotaInlineCss', 'convertToInlineCss');

$GLOBALS['TL_EVENTS'][\Avisota\Contao\Message\Core\Event\AvisotaMessageEvents::RENDER_MESSAGE_CONTENT]['replaceInsertTagsOnlineView'] =
	array('\HeimrichHannot\AvisotaInlineCss\AvisotaInlineCss', 'replaceInsertTagsOnlineView');

if (TL_MODE == 'BE') {
	$GLOBALS['TL_CSS'][] = '/system/modules/avisota_inline_css/assets/css/backend.css'; // static -> work around for contao 3
}