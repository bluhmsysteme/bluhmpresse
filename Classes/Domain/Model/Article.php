<?php
namespace Mkuehnel\Bluhmpresse\Domain\Model;

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
class Article extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * articleDate
	 *
	 * @var \DateTime
	 * @validate NotEmpty
	 */
	protected $articleDate;

	/**
	 * title
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * abstract
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $abstract;

	/**
	 * bodytext
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $bodytext;

	/**
	 * relatedImages
	 *
	 * @var \string
	 */
	protected $relatedImages;

	/**
	 * pdfFile
	 *
	 * @var \string
	 */
	protected $pdfFile;

	/**
	 * txtFile
	 *
	 * @var \string
	 */
	protected $txtFile;

	/**
	 * links
	 *
	 * @var \string
	 */
	protected $links;

	/**
	 * Branchen
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mkuehnel\Bluhmpresse\Domain\Model\Industry>
	 */
	protected $industries;

	/**
	 * Technologien
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mkuehnel\Bluhmpresse\Domain\Model\Technology>
	 */
	protected $technologies;

	/**
	 * Themen
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mkuehnel\Bluhmpresse\Domain\Model\Theme>
	 */
	protected $themes;

	/**
	 * Bereiche
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mkuehnel\Bluhmpresse\Domain\Model\Area>
	 */
	protected $areas;

	/**
	 * Returns the articleDate
	 *
	 * @return \DateTime $articleDate
	 */
	public function getArticleDate() {
		return $this->articleDate;
	}

	/**
	 * Sets the articleDate
	 *
	 * @param \DateTime $articleDate
	 * @return void
	 */
	public function setArticleDate($articleDate) {
		$this->articleDate = $articleDate;
	}

	/**
	 * Returns the title
	 *
	 * @return \string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param \string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the abstract
	 *
	 * @return \string $abstract
	 */
	public function getAbstract() {
		return $this->abstract;
	}

	/**
	 * Sets the abstract
	 *
	 * @param \string $abstract
	 * @return void
	 */
	public function setAbstract($abstract) {
		$this->abstract = $abstract;
	}

	/**
	 * Returns the bodytext
	 *
	 * @return \string $bodytext
	 */
	public function getBodytext() {
		return $this->bodytext;
	}

	/**
	 * Sets the bodytext
	 *
	 * @param \string $bodytext
	 * @return void
	 */
	public function setBodytext($bodytext) {
		$this->bodytext = $bodytext;
	}

	/**
	 * Returns the pdfFile
	 *
	 * @return \string $pdfFile
	 */
	public function getPdfFile() {
		return $this->pdfFile;
	}

	/**
	 * Sets the pdfFile
	 *
	 * @param \string $pdfFile
	 * @return void
	 */
	public function setPdfFile($pdfFile) {
		$this->pdfFile = $pdfFile;
	}

	/**
	 * Returns the txtFile
	 *
	 * @return \string $txtFile
	 */
	public function getTxtFile() {
		return $this->txtFile;
	}

	/**
	 * Sets the txtFile
	 *
	 * @param \string $txtFile
	 * @return void
	 */
	public function setTxtFile($txtFile) {
		$this->txtFile = $txtFile;
	}

	/**
	 * Returns the links
	 *
	 * @return \string $links
	 */
	public function getLinks() {
		return $this->links;
	}

	/**
	 * Sets the links
	 *
	 * @param \string $links
	 * @return void
	 */
	public function setLinks($links) {
		$this->links = $links;
	}

	/**
	 * __construct
	 *
	 * @return Article
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->industries = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		
		$this->technologies = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		
		$this->themes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		
		$this->areas = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Industry
	 *
	 * @param \Mkuehnel\Bluhmpresse\Domain\Model\Industry $industry
	 * @return void
	 */
	public function addIndustry(\Mkuehnel\Bluhmpresse\Domain\Model\Industry $industry) {
		$this->industries->attach($industry);
	}

	/**
	 * Removes a Industry
	 *
	 * @param \Mkuehnel\Bluhmpresse\Domain\Model\Industry $industryToRemove The Industry to be removed
	 * @return void
	 */
	public function removeIndustry(\Mkuehnel\Bluhmpresse\Domain\Model\Industry $industryToRemove) {
		$this->industries->detach($industryToRemove);
	}

	/**
	 * Returns the industries
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mkuehnel\Bluhmpresse\Domain\Model\Industry> $industries
	 */
	public function getIndustries() {
		return $this->industries;
	}

	/**
	 * Sets the industries
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mkuehnel\Bluhmpresse\Domain\Model\Industry> $industries
	 * @return void
	 */
	public function setIndustries(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $industries) {
		$this->industries = $industries;
	}

	/**
	 * Adds a Technology
	 *
	 * @param \Mkuehnel\Bluhmpresse\Domain\Model\Technology $technology
	 * @return void
	 */
	public function addTechnology(\Mkuehnel\Bluhmpresse\Domain\Model\Technology $technology) {
		$this->technologies->attach($technology);
	}

	/**
	 * Removes a Technology
	 *
	 * @param \Mkuehnel\Bluhmpresse\Domain\Model\Technology $technologyToRemove The Technology to be removed
	 * @return void
	 */
	public function removeTechnology(\Mkuehnel\Bluhmpresse\Domain\Model\Technology $technologyToRemove) {
		$this->technologies->detach($technologyToRemove);
	}

	/**
	 * Returns the technologies
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mkuehnel\Bluhmpresse\Domain\Model\Technology> $technologies
	 */
	public function getTechnologies() {
		return $this->technologies;
	}

	/**
	 * Sets the technologies
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mkuehnel\Bluhmpresse\Domain\Model\Technology> $technologies
	 * @return void
	 */
	public function setTechnologies(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $technologies) {
		$this->technologies = $technologies;
	}

	/**
	 * Adds a Theme
	 *
	 * @param \Mkuehnel\Bluhmpresse\Domain\Model\Theme $theme
	 * @return void
	 */
	public function addTheme(\Mkuehnel\Bluhmpresse\Domain\Model\Theme $theme) {
		$this->themes->attach($theme);
	}

	/**
	 * Removes a Theme
	 *
	 * @param \Mkuehnel\Bluhmpresse\Domain\Model\Theme $themeToRemove The Theme to be removed
	 * @return void
	 */
	public function removeTheme(\Mkuehnel\Bluhmpresse\Domain\Model\Theme $themeToRemove) {
		$this->themes->detach($themeToRemove);
	}

	/**
	 * Returns the themes
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mkuehnel\Bluhmpresse\Domain\Model\Theme> $themes
	 */
	public function getThemes() {
		return $this->themes;
	}

	/**
	 * Sets the themes
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mkuehnel\Bluhmpresse\Domain\Model\Theme> $themes
	 * @return void
	 */
	public function setThemes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $themes) {
		$this->themes = $themes;
	}

	/**
	 * Returns the relatedImages
	 *
	 * @return \string relatedImages
	 */
	public function getRelatedImages() {
		return $this->relatedImages;
	}

	/**
	 * Sets the relatedImages
	 *
	 * @param \string $relatedImages
	 * @return \string relatedImages
	 */
	public function setRelatedImages($relatedImages) {
		$this->relatedImages = $relatedImages;
	}

	/**
	 * Adds a Area
	 *
	 * @param \Mkuehnel\Bluhmpresse\Domain\Model\Area $area
	 * @return void
	 */
	public function addArea(\Mkuehnel\Bluhmpresse\Domain\Model\Area $area) {
		$this->areas->attach($area);
	}

	/**
	 * Removes a Area
	 *
	 * @param \Mkuehnel\Bluhmpresse\Domain\Model\Area $areaToRemove The Area to be removed
	 * @return void
	 */
	public function removeArea(\Mkuehnel\Bluhmpresse\Domain\Model\Area $areaToRemove) {
		$this->areas->detach($areaToRemove);
	}

	/**
	 * Returns the areas
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mkuehnel\Bluhmpresse\Domain\Model\Area> $areas
	 */
	public function getAreas() {
		return $this->areas;
	}

	/**
	 * Sets the areas
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mkuehnel\Bluhmpresse\Domain\Model\Area> $areas
	 * @return void
	 */
	public function setAreas(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $areas) {
		$this->areas = $areas;
	}

}
?>