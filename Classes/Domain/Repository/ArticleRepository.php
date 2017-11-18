<?php
namespace Mkuehnel\Bluhmpresse\Domain\Repository;

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
class ArticleRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    /**
     * defaultOrderings
     *
     * @var array
     */
    protected $defaultOrderings = array(
        'article_date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
     );

    /**
     * Returns all objects of this repository.
     *
     * @param \Mkuehnel\Bluhmpresse\Domain\Model\SearchFilter $filter
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface|array
     * @api
     */
    public function findByFilter($filter) {
        $query = $this->createQuery();
        //$query->getQuerySettings()->setRespectEnableFields(false);
        $query->getQuerySettings()->setEnableFieldsToBeIgnored(array());
        $query->getQuerySettings()->setIncludeDeleted(false);

        $constraints = array();
        if($filter->keyword) {
            $keywordConstraints = array();
            $keywordConstraints[] = $query->like('title', '%'.$filter->keyword.'%');
            $keywordConstraints[] = $query->like('abstract', '%'.$filter->keyword.'%');
            $keywordConstraints[] = $query->like('bodytext', '%'.$filter->keyword.'%');
            $constraints[] = $query->logicalOr($keywordConstraints);
        }
        if($filter->area) {
            $constraints[] = $query->contains('areas', $filter->area);
        }
        if($filter->industry) {
            $constraints[] = $query->contains('industries', $filter->industry);
        }
        if($filter->technology) {
            $constraints[] = $query->contains('technologies', $filter->technology);
        }
        if($filter->theme) {
            $constraints[] = $query->contains('themes', $filter->theme);
        }
        if($filter->year) {
            $minDate = mktime(0, 0, 0, 1, 1, $filter->year);
            $maxDate = mktime(23, 59, 59, 12, 31, $filter->year);
            $constraints[] = $query->greaterThanOrEqual('article_date', $minDate);
            $constraints[] = $query->lessThanOrEqual('article_date', $maxDate);
        }

        if(count($constraints)) {
            return $query->matching(
                            $query->logicalAnd($constraints)
                        )
                        ->execute();
        }
        else {
            return $this->findAll();
        }
    }

    /**
     * Finds years having articles mathcing the filter
     *
       @param \Mkuehnel\Bluhmpresse\Domain\Model\SearchFilter $filter
     * @return array of years
     */
    public function findYearsByFilter($filter) {
        $filter2 = clone $filter;
        $filter2->year = null;
        $articles = $this->findByFilter($filter2);
        $yearArray = array();
        foreach($articles as $article) {
            $date = $article->getArticleDate();
            $year = $date->format('Y');
            if(!isset($yearArray[$year])) {
                $yearArray[$year] = array('count' => 0);
            }
            if(!isset($yearArray[$year]['value'])) {
                $yearFilter = clone $filter2;
                $yearFilter->year = $year;
                $yearArray[$year]['value'] = intval($year);
                $yearArray[$year]['searchFilter'] = $yearFilter;
            }
            $yearArray[$year]['count']++;
        }
        return $yearArray;
    }

}
?>
