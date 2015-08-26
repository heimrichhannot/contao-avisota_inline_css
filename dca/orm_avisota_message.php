<?php

$dca = &$GLOBALS['TL_DCA']['orm_avisota_message'];

/**
 * Fields
 */
unset($dca['fields']['description']['eval']['maxlength']);
unset($dca['fields']['description']['eval']['rows']);
$dca['fields']['description']['eval']['rte'] = 'tinyMCE';
$dca['fields']['description']['inputType'] = "textarea";
$dca['fields']['description']['sql'] = "text NULL";
