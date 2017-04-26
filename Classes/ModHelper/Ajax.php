<?php
namespace Extension\Templavoila\ModHelper;

class Ajax {
    
    /**
     * @var \Extension\Templavoila\Service\ApiService
     */
    private $apiObj;
    
    /**
     * @return \tx_templavoila_mod1_ajax
     */
    public function __construct() {
        $this->apiObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\Extension\Templavoila\Service\ApiService::class);
    }
    
    /**
     * Performs a move action for the requested element
     *
     * @param array $params
     * @param object $ajaxObj
     *
     * @return void
     */
    public function moveRecord($params, &$ajaxObj) {
        
        $sourcePointer = $this->apiObj->flexform_getPointerFromString(\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('source'));
        
        $destinationPointer = $this->apiObj->flexform_getPointerFromString(\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('destination'));
        
        $this->apiObj->moveElement($sourcePointer, $destinationPointer);
    }
}
