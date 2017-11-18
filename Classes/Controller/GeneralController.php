<?php
namespace Mkuehnel\Bluhmpresse\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Andreas Knoll <andreas.knoll@visia.de>, Visia GmbH
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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

/**
 *
 *
 * @package bluhmpresse
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class GeneralController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	 /**
     * industryRepository
     *
     * @var \Mkuehnel\Bluhmpresse\Domain\Repository\IndustryRepository
     * @inject
     */
    protected $industryRepository;
    
     /**
     * technologyRepository
     *
     * @var \Mkuehnel\Bluhmpresse\Domain\Repository\TechnologyRepository
     * @inject
     */
    protected $technologyRepository;
    
    /**
     * themeRepository
     *
     * @var \Mkuehnel\Bluhmpresse\Domain\Repository\ThemeRepository
     * @inject
     */
    protected $themeRepository;
    
    /**
     * searchbox
     *
     * @return void
     */
    public function searchboxAction() {
        $filter = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('Mkuehnel\Bluhmpresse\Domain\Model\SearchFilter');
        
        $industries = $this->industryRepository->findAll();
        $this->view->assign('industries', $industries);
        
        $technologies = $this->technologyRepository->findAll();
        $this->view->assign('technologies', $technologies);
        
        $themes = $this->themeRepository->findAll();
        $this->view->assign('themes', $themes);
        
        $this->view->assign('searchFilter', $filter);
        $this->view->assign('settings', $this->settings);
    }

}
?>