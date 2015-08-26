<?php

$dca = &$GLOBALS['TL_DCA']['orm_avisota_layout'];

/**
 * Palettes
 */
$dca['metapalettes']['mailChimp']['template'][] = 'inlineStylesheets';
$dca['metapalettes']['mailChimp']['template'][] = 'headerStylesheets';


/**
 * Fields
 */
$dca['fields']['inlineStylesheets'] = array(
	'label' => &$GLOBALS['TL_LANG']['orm_avisota_layout']['inlineStylesheets'],
	'exclude' => true,
	'inputType' => 'fileTree',
	'eval' => array(
		'fieldType' => 'checkbox',
		'filesOnly' => true,
		'multiple' => true,
		'extensions' => 'css'
	),
	'sql' => 'binary(16) NULL'
);

$dca['fields']['headerStylesheets'] = array(
  'label' => &$GLOBALS['TL_LANG']['orm_avisota_layout']['headerStylesheets'],
  'exclude' => true,
  'inputType' => 'fileTree',
  'eval' => array(
	'fieldType' => 'checkbox',
	'filesOnly' => true,
	'multiple' => true,
	'extensions' => 'css'
  ),
  'sql' => 'binary(16) NULL'
);