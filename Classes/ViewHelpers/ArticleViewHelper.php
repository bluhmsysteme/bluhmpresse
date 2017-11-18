<?php
namespace Mkuehnel\Bluhmpresse\ViewHelpers;

/**
 * View helper for getting Article object by uid
 *
 * @package TYPO3
 * @subpackage Fluid
 * @version
 */
class Tx_Bluhmpresse_ViewHelpers_ArticleViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	
	/**
	 * articleRepository
	 *
	 * @var \Mkuehnel\Bluhmpresse\Domain\Repository\ArticleRepository
	 * @inject
	 */
	protected $articleRepository;

    /**
     * Renders some classic dummy content: Lorem Ipsum...
     *
     * @param integer $uid the uid of the image
	 * @param string $as Name of variable to assign result to
     * @return \Mkuehnel\Bluhmpresse\Domain\Model\Image
     */
    public function render($uid, $as) {
        $article = $this->articleRepository->findByUid($uid);
		
		if($as) {
			$this->templateVariableContainer->add($as, $article);
            $output = $this->renderChildren();
            $this->templateVariableContainer->remove($as);
            return $output;
		}
		else return $article;
    }
}