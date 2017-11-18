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
class Image extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * imageDate
	 *
	 * @var \DateTime
	 * @validate NotEmpty
	 */
	protected $imageDate;

	/**
	 * title
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * source
	 *
	 * @var \string
	 */
	protected $source;

	/**
	 * image72
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $image72;

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
	 * Returns the imageDate
	 *
	 * @return \DateTime $imageDate
	 */
	public function getImageDate() {
		return $this->imageDate;
	}

	/**
	 * Sets the imageDate
	 *
	 * @param \DateTime $imageDate
	 * @return void
	 */
	public function setImageDate($imageDate) {
		$this->imageDate = $imageDate;
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
	 * Returns the source
	 *
	 * @return \string $source
	 */
	public function getSource() {
		return $this->source;
	}

	/**
	 * Sets the source
	 *
	 * @param \string $source
	 * @return void
	 */
	public function setSource($source) {
		$this->source = $source;
	}

	/**
	 * Returns the image72
	 *
	 * @return \string $image72
	 */
	public function getImage72() {
		return $this->image72;
	}

	/**
	 * Sets the image72
	 *
	 * @param \string $image72
	 * @return void
	 */
	public function setImage72($image72) {
		$this->image72 = $image72;
	}

	/**
	 * __construct
	 *
	 * @return Image
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

}
?>
