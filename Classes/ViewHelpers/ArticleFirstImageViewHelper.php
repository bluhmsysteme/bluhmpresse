<?php
namespace Mkuehnel\Bluhmpresse\ViewHelpers;

/**
 * View helper for providing first image of article
 *
 * @package TYPO3
 * @subpackage Fluid
 * @version
 */
class ArticleFirstImageViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	
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
     * @param string $imageIds the ids of the images attached to the article
	 * @param string $as Name of variable to assign result to
     * @return \Mkuehnel\Bluhmpresse\Domain\Model\Image
     */
    public function render($imageIds, $as) {
        $imageIds = explode(',', $imageIds);
        $image = $this->imageRepository->findByUid($imageIds[0]);
		
		if($as) {
			$this->templateVariableContainer->add($as, $image);
            $output = $this->renderChildren();
            $this->templateVariableContainer->remove($as);
            return $output;
		}
		else return $image;
    }
}