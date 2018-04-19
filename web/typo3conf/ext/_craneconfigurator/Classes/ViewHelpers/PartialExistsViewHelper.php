<?php
namespace Crossconcept\TeichmannCraneconfigurator\ViewHelpers;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Copyright note: Some parts are copied from the Fluid package.
 * Usage example:
 *  <f:if condition="{krbu:PartialExists(partial: 'Category/{item.category.id}/DetailCol1')}">
 *    <f:then><f:render partial="Category/{item.category.id}/DetailCol1" arguments="{_all}" /></f:then>
 *    <f:else><f:render partial="Category/Default/DetailCol1" arguments="{_all}" /></f:else>
 *  </f:if>
 */
class PartialExistsViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
    /**
     * Pattern to be resolved for "@partialRoot" in the other patterns.
     * Following placeholders are supported:
     * - "@packageResourcesPath"
     *
     * @var string
     */
    protected $partialRootPathPattern = '@packageResourcesPath/Private/Partials';

    /**
     * Does the given partial exist?
     *
     * @author Arne-Kolja Bachstein
     * @param string $partial
     *
     * @return boolean
     */
    public function render($partial) {
        $actionRequest = $this->controllerContext->getRequest();
        $possibilities = array(str_replace(
            '@packageResourcesPath',
            ExtensionManagementUtility::extPath($actionRequest->getControllerExtensionKey()) . 'Resources/', $this->partialRootPathPattern)
        );
        foreach($possibilities as $p) {
            if (file_exists($p . "/".$partial.".html")) {
                return true;
            }
        }
        return false;
    }
}
?>