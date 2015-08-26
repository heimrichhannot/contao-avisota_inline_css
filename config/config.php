<?php

$GLOBALS['TL_EVENTS'][\Avisota\Contao\Message\Core\Event\AvisotaMessageEvents::POST_RENDER_MESSAGE_CONTENT]['removeExternalCss'] =
	array('\HeimrichHannot\XAvisotaInlineCss\XAvisotaInlineCss', 'removeExternalCss');

$GLOBALS['TL_EVENTS'][\Avisota\Contao\Message\Core\Event\AvisotaMessageEvents::POST_RENDER_MESSAGE_CONTENT]['addHeaderCss'] =
	array('\HeimrichHannot\XAvisotaInlineCss\XAvisotaInlineCss', 'addHeaderCss');

$GLOBALS['TL_EVENTS'][\Avisota\Contao\Message\Core\Event\AvisotaMessageEvents::POST_RENDER_MESSAGE_CONTENT]['convertPToBr'] =
	array('\HeimrichHannot\XAvisotaInlineCss\XAvisotaInlineCss', 'convertPToBr');

$GLOBALS['TL_EVENTS'][\Avisota\Contao\Message\Core\Event\AvisotaMessageEvents::POST_RENDER_MESSAGE_CONTENT]['convertToInlineCss'] =
	array('\HeimrichHannot\XAvisotaInlineCss\XAvisotaInlineCss', 'convertToInlineCss');

$GLOBALS['TL_EVENTS'][\Avisota\Contao\Message\Core\Event\AvisotaMessageEvents::RENDER_MESSAGE_CONTENT]['replaceInsertTagsOnlineView'] =
	array('\HeimrichHannot\XAvisotaInlineCss\XAvisotaInlineCss', 'replaceInsertTagsOnlineView');

if (TL_MODE == 'BE') {
	$GLOBALS['TL_CSS'][] = '/system/modules/xavisota_inline_css/assets/css/backend.css'; // static -> work around for contao 3
}