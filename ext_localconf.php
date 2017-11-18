<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Mkuehnel.' . $_EXTKEY,
	'Pi1',
	array(
		'Article' => 'list, show',
		'Image' => 'list, show',
		'General' => 'searchbox',
		'PresseCD' => 'download'
	),
	// non-cacheable actions
	array(
		'Article' => 'list, show',
		'Image' => 'list, show',
		'General' => 'searchbox',
		'PresseCD' => 'download'
	)
);
/*
$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT']['postVarSets']['_DEFAULT']['page'] = array(
    array(
        'GETvar' => 'tx_bluhmpresse_pi1[@widget_0][currentPage]',
    )
);
$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT']['postVarSets']['_DEFAULT']['article'] = array(
    array(
        'GETvar' => 'tx_bluhmpresse_pi1[controller]',
        'valueMap'    => array(
            'Dein-URL-Pfadsegmentname' => 'Article'
        ),
        'noMatch' => 'bypass',
    ),
    array(
        'GETvar' => 'tx_bluhmpresse_pi1[action]',
        'valueMap'    => array(
            'detail' => 'show',
        ),
        'noMatch' => 'bypass',
    ),
    array(
        'GETvar' => 'tx_bluhmpresse_pi1[article]',
        'lookUpTable' => array(
            'table' => 'tx_bluhmpresse_domain_model_article',
            'id_field' => 'uid',
            'alias_field' => 'title',
            'addWhereClause' => ' AND NOT deleted',
            'useUniqueCache' => 1,
            'useUniqueCache_conf' => array( 
                'strtolower' => 1,
                'spaceCharacter' => '-' 
            ),
        ),
     ),
     array(
        'GETvar' => 'tx_bluhmpresse_pi1[image]',
        'lookUpTable' => array(
            'table' => 'tx_bluhmpresse_domain_model_image',
            'id_field' => 'uid',
            'alias_field' => 'title',
            'addWhereClause' => ' AND NOT deleted',
            'useUniqueCache' => 1,
            'useUniqueCache_conf' => array( 
                'strtolower' => 1,
                'spaceCharacter' => '-' 
            ),
        ),
     ),
);
 */
?>