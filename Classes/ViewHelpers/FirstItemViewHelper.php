<?php
namespace Mkuehnel\Bluhmpresse\ViewHelpers;

/**
 * View helper for providing first item of item list
 *
 * @package TYPO3
 * @subpackage Fluid
 * @version
 */
class FirstItemViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * Renders some classic dummy content: Lorem Ipsum...
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $items
	 * @param string $as Name of variable to assign result to
     * @return \Mkuehnel\Bluhmpresse\Domain\Model\Image
     */
    public function render($items, $as) {
    	$item = $items->current();
		
		if($as) {
			$this->templateVariableContainer->add($as, $item);
            $output = $this->renderChildren();
            $this->templateVariableContainer->remove($as);
            return $output;
		}
		else return $image;
    }
}