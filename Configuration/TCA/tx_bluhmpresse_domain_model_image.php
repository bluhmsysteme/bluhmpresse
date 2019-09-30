<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
    'ctrl' => array(
        'title'	=> 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_image',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => TRUE,

        'versioningWS' => 2,
        'versioning_followPages' => TRUE,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
        'searchFields' => 'image_date,title,source,image72,image300,industries,technologies,themes,',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('bluhmpresse') . 'Resources/Public/Icons/tx_bluhmpresse_domain_model_image.gif'
    ),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, image_date, title, source, image72, industries, technologies, themes',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, image_date, title, source, image72, industries, technologies, themes,
		                              --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,
		                                  starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_bluhmpresse_domain_model_image',
				'foreign_table_where' => 'AND tx_bluhmpresse_domain_model_image.pid=###CURRENT_PID### AND tx_bluhmpresse_domain_model_image.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'image_date' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_image.image_date',
			'config' => array(
				'type' => 'input',
				'size' => 7,
				'eval' => 'date,required',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_image.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'source' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_image.source',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'image72' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_image.image72',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_bluhmpresse',
				'show_thumbs' => 1,
				'minitems' => 1,
				'maxitems' => 1,
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'disallowed' => '',
			),
		),
		'industries' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_image.industries',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_bluhmpresse_domain_model_industry',
                'MM' => 'tx_bluhmpresse_image_industry_mm',
                'renderMode' => 'checkbox',
                'maxitems' => 9999,
                'multiple' => 0,
                'wizards' => array(
                    '_PADDING' => 1,
                    '_VERTICAL' => 1,
                    'edit' => array(
                        'type' => 'popup',
                        'title' => 'Edit',
'module' => [                  
 'name' => 'wizard_edit',
],
                        'icon' => 'edit2.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        ),
                    'add' => Array(
                        'type' => 'script',
                        'title' => 'Create new',
                        'icon' => 'add.gif',
                        'params' => array(
                            'table' => 'tx_bluhmpresse_domain_model_industry',
                            'pid' => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                            ),
'module' => [
 'name' => 'wizard_add'
],
                    ),
                ),
            ),
        ),
        'technologies' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_image.technologies',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_bluhmpresse_domain_model_technology',
                'MM' => 'tx_bluhmpresse_image_technology_mm',
                'renderMode' => 'checkbox',
                'maxitems' => 9999,
                'multiple' => 0,
                'wizards' => array(
                    '_PADDING' => 1,
                    '_VERTICAL' => 1,
                    'edit' => array(
                        'type' => 'popup',
                        'title' => 'Edit',
'module' => [                  
 'name' => 'wizard_edit',
],
                        'icon' => 'edit2.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        ),
                    'add' => Array(
                        'type' => 'script',
                        'title' => 'Create new',
                        'icon' => 'add.gif',
                        'params' => array(
                            'table' => 'tx_bluhmpresse_domain_model_technology',
                            'pid' => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                            ),
'module' => [
 'name' => 'wizard_add'
],
                    ),
                ),
            ),
        ),
        'themes' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_image.themes',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_bluhmpresse_domain_model_theme',
                'MM' => 'tx_bluhmpresse_image_theme_mm',
                'renderMode' => 'checkbox',
                'maxitems' => 9999,
                'multiple' => 0,
                'wizards' => array(
                    '_PADDING' => 1,
                    '_VERTICAL' => 1,
                    'edit' => array(
                        'type' => 'popup',
                        'title' => 'Edit',
'module' => [                  
 'name' => 'wizard_edit',
],
                        'icon' => 'edit2.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        ),
                    'add' => Array(
                        'type' => 'script',
                        'title' => 'Create new',
                        'icon' => 'add.gif',
                        'params' => array(
                            'table' => 'tx_bluhmpresse_domain_model_theme',
                            'pid' => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                            ),
'module' => [
 'name' => 'wizard_add'
],
                    ),
                ),
            ),
        ),
	),
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
?>
