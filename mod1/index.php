<?php
/*
 * 6.2 module compatibility - allow old folder, but use new controller design
 */
if (! isset($MCONF)) {
    require (dirname(__FILE__) . '/conf.php');
}

class tx_templavoila_module1 extends \Extension\Templavoila\Controller\BackendModulePage
{
    
}

// Make instance:
$SOBE = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\Extension\Templavoila\Controller\BackendModulePage::class);
$SOBE->init();
$SOBE->main();
$SOBE->printContent();
?>
