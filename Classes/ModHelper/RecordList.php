<?php
namespace Extension\Templavoila\ModHelper;

$LANG->includeLLFile('EXT:lang/locallang_mod_web_list.xlf');

class RecordList extends \TYPO3\CMS\Recordlist\RecordList\DatabaseRecordList {

	/**
	 * @var \tx_templavoila_module1
	 */
	public $pObj;

	/**
	 * Prepares object to run.
	 *
	 * @param \tx_templavoila_module1 &$pObj Parent object (mod1/index.php)
	 *
	 * @return void
	 */
	public function start(&$pObj) {
		$this->pObj = & $pObj;
		$GLOBALS['SOBE']->MOD_SETTINGS['bigControlPanel'] = 1; // enable extended view
		$this->script = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('templavoila') . 'mod1/index.php';

		parent::start($this->pObj->rootElementUid_pidForContent,
			'', //$this->pObj->MOD_SETTINGS['recordsView_table'],
			(int)$this->pObj->MOD_SETTINGS['recordsView_start']);
	}

	/**
	 * Creates the button with link to either forward or reverse
	 *
	 * @param string $type Type: "fwd" or "rwd"
	 * @param integer $pointer Pointer
	 * @param string $table Table name
	 *
	 * @return string
	 */
	public function fwd_rwd_HTML($type, $pointer, $table = '') {
		$content = '';
		switch ($type) {
			case 'fwd':
				$href = $this->returnUrl . '&SET[recordsView_start]=' . ($pointer - $this->iLimit) . '&SET[recordsView_table]=' . $table;
				$content = '<a href="' . htmlspecialchars($href) . '">' .
					\TYPO3\CMS\Backend\Utility\IconUtility::getSpriteIcon('actions-move-up') .
					'</a> <i>[1 - ' . $pointer . ']</i>';
				break;
			case 'rwd':
				$href = $this->returnUrl . '&SET[recordsView_start]=' . $pointer . '&SET[recordsView_table]=' . $table;
				$content = '<a href="' . htmlspecialchars($href) . '">' .
					\TYPO3\CMS\Backend\Utility\IconUtility::getSpriteIcon('actions-move-down') .
					'</a> <i>[' . ($pointer + 1) . ' - ' . $this->totalItems . ']</i>';
				break;
		}

		return $content;
	}
}
