<?php
namespace Mkuehnel\Bluhmpresse\ViewHelpers;

/**
 * View helper for getting Image object by uid
 *
 * @package TYPO3
 * @subpackage Fluid
 * @version
 */
class ImageViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	
	/**
	 * imageRepository
	 *
	 * @var \Mkuehnel\Bluhmpresse\Domain\Repository\ImageRepository
	 * @inject
	 */

	protected $imageRepository;
	protected $escapeOutput = false;

    /**
     * Renders some classic dummy content: Lorem Ipsum...
     *
     * @param integer $uid the uid of the image
	 * @param string $as Name of variable to assign result to
     * @return \Mkuehnel\Bluhmpresse\Domain\Model\Image
     */
    public function render($uid, $as) {
        $image = $this->imageRepository->findByUid($uid);

		if($as) {
			$this->templateVariableContainer->add($as, $image);
            $output = $this->renderChildren();
            $this->templateVariableContainer->remove($as);
            return $output;
		}
		else return $image;
    }
}