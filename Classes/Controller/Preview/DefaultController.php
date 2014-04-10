<?php
namespace Extension\Templavoila\Controller\Preview;

/***************************************************************
 * Copyright notice
 *
 * (c) 2010 Tolleiv Nietsch (tolleiv.nietsch@typo3.org)
 * (c) 2010 Steffen Kamper (info@sk-typo3.de)
 *  All rights reserved
 *
 *  This script is part of the Typo3 project. The Typo3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
class DefaultController {

	/**
	 *
	 * @param array $row
	 * @param string $table
	 * @param string $output
	 * @param boolean $alreadyRendered
	 * @param object $ref
	 *
	 * @return string
	 */
	public function render_previewContent($row, $table, $output, $alreadyRendered, &$ref) {
		return '<strong>' . \Extension\Templavoila\Utility\GeneralUtility::getLanguageService()->sL(\TYPO3\CMS\Backend\Utility\BackendUtility::getLabelFromItemlist('tt_content', 'CType', $row['CType'])) . '</strong>';
	}
}
