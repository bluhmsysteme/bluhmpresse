<?php

namespace Bluhm\Bluhmpresse\Tests;
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

/**
 * Test case for class \Bluhm\Bluhmpresse\Domain\Model\Article.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Bluhm Pressebereich
 *
 * @author Andreas Knoll <andreas.knoll@visia.de>
 */
class ArticleTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \Bluhm\Bluhmpresse\Domain\Model\Article
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \Bluhm\Bluhmpresse\Domain\Model\Article();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getArticleDateReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setArticleDateForDateTimeSetsArticleDate() { }
	
	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getAbstractReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setAbstractForStringSetsAbstract() { 
		$this->fixture->setAbstract('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAbstract()
		);
	}
	
	/**
	 * @test
	 */
	public function getBodytextReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setBodytextForStringSetsBodytext() { 
		$this->fixture->setBodytext('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getBodytext()
		);
	}
	
	/**
	 * @test
	 */
	public function getRelatedImagesReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setRelatedImagesForStringSetsRelatedImages() { 
		$this->fixture->setRelatedImages('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getRelatedImages()
		);
	}
	
	/**
	 * @test
	 */
	public function getPdfFileReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setPdfFileForStringSetsPdfFile() { 
		$this->fixture->setPdfFile('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getPdfFile()
		);
	}
	
	/**
	 * @test
	 */
	public function getTxtFileReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTxtFileForStringSetsTxtFile() { 
		$this->fixture->setTxtFile('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTxtFile()
		);
	}
	
	/**
	 * @test
	 */
	public function getLinksReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLinksForStringSetsLinks() { 
		$this->fixture->setLinks('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLinks()
		);
	}
	
	/**
	 * @test
	 */
	public function getIndustriesReturnsInitialValueForIndustry() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getIndustries()
		);
	}

	/**
	 * @test
	 */
	public function setIndustriesForObjectStorageContainingIndustrySetsIndustries() { 
		$industry = new \Bluhm\Bluhmpresse\Domain\Model\Industry();
		$objectStorageHoldingExactlyOneIndustries = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneIndustries->attach($industry);
		$this->fixture->setIndustries($objectStorageHoldingExactlyOneIndustries);

		$this->assertSame(
			$objectStorageHoldingExactlyOneIndustries,
			$this->fixture->getIndustries()
		);
	}
	
	/**
	 * @test
	 */
	public function addIndustryToObjectStorageHoldingIndustries() {
		$industry = new \Bluhm\Bluhmpresse\Domain\Model\Industry();
		$objectStorageHoldingExactlyOneIndustry = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneIndustry->attach($industry);
		$this->fixture->addIndustry($industry);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneIndustry,
			$this->fixture->getIndustries()
		);
	}

	/**
	 * @test
	 */
	public function removeIndustryFromObjectStorageHoldingIndustries() {
		$industry = new \Bluhm\Bluhmpresse\Domain\Model\Industry();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($industry);
		$localObjectStorage->detach($industry);
		$this->fixture->addIndustry($industry);
		$this->fixture->removeIndustry($industry);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getIndustries()
		);
	}
	
	/**
	 * @test
	 */
	public function getTechnologiesReturnsInitialValueForTechnology() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getTechnologies()
		);
	}

	/**
	 * @test
	 */
	public function setTechnologiesForObjectStorageContainingTechnologySetsTechnologies() { 
		$technology = new \Bluhm\Bluhmpresse\Domain\Model\Technology();
		$objectStorageHoldingExactlyOneTechnologies = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneTechnologies->attach($technology);
		$this->fixture->setTechnologies($objectStorageHoldingExactlyOneTechnologies);

		$this->assertSame(
			$objectStorageHoldingExactlyOneTechnologies,
			$this->fixture->getTechnologies()
		);
	}
	
	/**
	 * @test
	 */
	public function addTechnologyToObjectStorageHoldingTechnologies() {
		$technology = new \Bluhm\Bluhmpresse\Domain\Model\Technology();
		$objectStorageHoldingExactlyOneTechnology = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneTechnology->attach($technology);
		$this->fixture->addTechnology($technology);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneTechnology,
			$this->fixture->getTechnologies()
		);
	}

	/**
	 * @test
	 */
	public function removeTechnologyFromObjectStorageHoldingTechnologies() {
		$technology = new \Bluhm\Bluhmpresse\Domain\Model\Technology();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($technology);
		$localObjectStorage->detach($technology);
		$this->fixture->addTechnology($technology);
		$this->fixture->removeTechnology($technology);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getTechnologies()
		);
	}
	
	/**
	 * @test
	 */
	public function getThemesReturnsInitialValueForTheme() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getThemes()
		);
	}

	/**
	 * @test
	 */
	public function setThemesForObjectStorageContainingThemeSetsThemes() { 
		$theme = new \Bluhm\Bluhmpresse\Domain\Model\Theme();
		$objectStorageHoldingExactlyOneThemes = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneThemes->attach($theme);
		$this->fixture->setThemes($objectStorageHoldingExactlyOneThemes);

		$this->assertSame(
			$objectStorageHoldingExactlyOneThemes,
			$this->fixture->getThemes()
		);
	}
	
	/**
	 * @test
	 */
	public function addThemeToObjectStorageHoldingThemes() {
		$theme = new \Bluhm\Bluhmpresse\Domain\Model\Theme();
		$objectStorageHoldingExactlyOneTheme = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneTheme->attach($theme);
		$this->fixture->addTheme($theme);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneTheme,
			$this->fixture->getThemes()
		);
	}

	/**
	 * @test
	 */
	public function removeThemeFromObjectStorageHoldingThemes() {
		$theme = new \Bluhm\Bluhmpresse\Domain\Model\Theme();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($theme);
		$localObjectStorage->detach($theme);
		$this->fixture->addTheme($theme);
		$this->fixture->removeTheme($theme);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getThemes()
		);
	}
	
	/**
	 * @test
	 */
	public function getAreasReturnsInitialValueForArea() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getAreas()
		);
	}

	/**
	 * @test
	 */
	public function setAreasForObjectStorageContainingAreaSetsAreas() { 
		$area = new \Bluhm\Bluhmpresse\Domain\Model\Area();
		$objectStorageHoldingExactlyOneAreas = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneAreas->attach($area);
		$this->fixture->setAreas($objectStorageHoldingExactlyOneAreas);

		$this->assertSame(
			$objectStorageHoldingExactlyOneAreas,
			$this->fixture->getAreas()
		);
	}
	
	/**
	 * @test
	 */
	public function addAreaToObjectStorageHoldingAreas() {
		$area = new \Bluhm\Bluhmpresse\Domain\Model\Area();
		$objectStorageHoldingExactlyOneArea = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneArea->attach($area);
		$this->fixture->addArea($area);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneArea,
			$this->fixture->getAreas()
		);
	}

	/**
	 * @test
	 */
	public function removeAreaFromObjectStorageHoldingAreas() {
		$area = new \Bluhm\Bluhmpresse\Domain\Model\Area();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($area);
		$localObjectStorage->detach($area);
		$this->fixture->addArea($area);
		$this->fixture->removeArea($area);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getAreas()
		);
	}
	
}
?>