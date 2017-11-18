<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Mkuehnel.' . $_EXTKEY,
	'Pi1',
	'Bluhm Presse'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_pi1';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_pi1.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Bluhm Pressebereich');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/pageTSconfig.txt">');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bluhmpresse_domain_model_article', 'EXT:bluhmpresse/Resources/Private/Language/locallang_csh_tx_bluhmpresse_domain_model_article.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bluhmpresse_domain_model_article');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bluhmpresse_domain_model_industry', 'EXT:bluhmpresse/Resources/Private/Language/locallang_csh_tx_bluhmpresse_domain_model_industry.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bluhmpresse_domain_model_industry');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bluhmpresse_domain_model_technology', 'EXT:bluhmpresse/Resources/Private/Language/locallang_csh_tx_bluhmpresse_domain_model_technology.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bluhmpresse_domain_model_technology');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bluhmpresse_domain_model_theme', 'EXT:bluhmpresse/Resources/Private/Language/locallang_csh_tx_bluhmpresse_domain_model_theme.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bluhmpresse_domain_model_theme');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bluhmpresse_domain_model_image', 'EXT:bluhmpresse/Resources/Private/Language/locallang_csh_tx_bluhmpresse_domain_model_image.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bluhmpresse_domain_model_image');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bluhmpresse_domain_model_area', 'EXT:bluhmpresse/Resources/Private/Language/locallang_csh_tx_bluhmpresse_domain_model_area.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bluhmpresse_domain_model_area');
$TCA['tx_bluhmpresse_domain_model_area'] = array(

);

?>