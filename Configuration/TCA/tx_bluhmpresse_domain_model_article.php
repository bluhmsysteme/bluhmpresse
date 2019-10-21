<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
    'ctrl' => array(
        'title'	=> 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_article',
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
        'searchFields' => 'article_date,title,abstract,bodytext,related_images,pdf_file,txt_file,links,industries,technologies,themes,areas,',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('bluhmpresse') . 'Resources/Public/Icons/tx_bluhmpresse_domain_model_article.gif'
    ),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, article_date, title, abstract, bodytext, related_images, pdf_file, txt_file, links, industries, technologies, themes, areas',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, article_date, title, path_segment, abstract, bodytext, links,
		                              --div--;LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xml:tx_bluhmpresse_domain_model_article.tabs.files,
		                                  related_images, pdf_file, txt_file,
		                              --div--;LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xml:tx_bluhmpresse_domain_model_article.tabs.relations,
		                                  areas, industries, technologies, themes,
		                              --div--;LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xml:tx_bluhmpresse_domain_model_article.tabs.access,
		                                  starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
        'path_segment' => array(
            'exclude' => 1,
            'config' => array(
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['title'],
                    'replacements' => [
                        '/' => '-'
                    ],
                ],
                'fallbackCharacter' => '-',
                'eval' => 'uniqueInSite',
                'default' => ''
            ),
        ),
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
				'foreign_table' => 'tx_bluhmpresse_domain_model_article',
				'foreign_table_where' => 'AND tx_bluhmpresse_domain_model_article.pid=###CURRENT_PID### AND tx_bluhmpresse_domain_model_article.sys_language_uid IN (-1,0)',
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
		'article_date' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_article.article_date',
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
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_article.title',
			'config' => array(
				'type' => 'input',
				'size' => 48,
				'eval' => 'trim,required'
			),
		),
		'abstract' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_article.abstract',
			'config' => array(
				'type' => 'text',
				'cols' => 48,
				'rows' => 3,
				'eval' => 'trim,required'
			),
		),
		'bodytext' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_article.bodytext',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
'module' => [                  
 'name' => 'wizard_rte',
],
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
			'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
		),
		'related_images' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_article.related_images',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'db',
				'show_thumbs' => 1,
				'size' => 3,
				'allowed' => 'tx_bluhmpresse_domain_model_image',
                'disallowed' => '',
                'minitems' => 0,
                'maxitems' => 10,
			),
		),
		'pdf_file' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_article.pdf_file',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_bluhmpresse',
				'allowed' => 'pdf',
				'disallowed' => '',
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'txt_file' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_article.txt_file',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_bluhmpresse',
				'allowed' => 'txt',
				'disallowed' => '',
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'links' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_article.links',
            'config' => array(
                'type' => 'text',
                'cols' => 40,
                'rows' => 5,
                'eval' => 'trim',
                'wizards' => array(
                    'RTE' => array(
                        'icon' => 'wizard_rte2.gif',
                        'notNewRecords'=> 1,
                        'RTEonly' => 1,
'module' => [                  
 'name' => 'wizard_rte',
],
                        'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                        'type' => 'script',
                        'showButtons' => 'blockstylelabel'
                    )
                )
            ),
            'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
        ),
		'industries' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_article.industries',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_bluhmpresse_domain_model_industry',
				'MM' => 'tx_bluhmpresse_article_industry_mm',
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
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_article.technologies',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_bluhmpresse_domain_model_technology',
				'MM' => 'tx_bluhmpresse_article_technology_mm',
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
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_article.themes',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_bluhmpresse_domain_model_theme',
				'MM' => 'tx_bluhmpresse_article_theme_mm',
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
		'areas' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:bluhmpresse/Resources/Private/Language/locallang_db.xlf:tx_bluhmpresse_domain_model_article.areas',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_bluhmpresse_domain_model_area',
				'MM' => 'tx_bluhmpresse_article_area_mm',
				'size' => 3,
				'minitems' => 1,
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
							'table' => 'tx_bluhmpresse_domain_model_area',
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
?>