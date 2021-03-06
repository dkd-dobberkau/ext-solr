<?php
namespace ApacheSolrForTypo3\Solr\ViewHelpers\Uri;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use ApacheSolrForTypo3\Solr\Domain\Search\ResultSet\SearchResultSet;
use ApacheSolrForTypo3\Solr\Domain\Search\Uri\SearchUriBuilder;
use ApacheSolrForTypo3\Solr\ViewHelpers\AbstractSolrFrontendViewHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * Class FacetAddOptionViewHelper
 *
 * @author Frans Saris <frans@beech.it>
 * @author Timo Hund <timo.hund@dkd.de>
 * @package ApacheSolrForTypo3\Solr\ViewHelpers\Uri
 */
abstract class AbstractUriViewHelper extends AbstractSolrFrontendViewHelper
{
    use CompileWithRenderStatic;

    /**
     * @var SearchUriBuilder
     */
    protected static $searchUriBuilder;

    /**
     * @param SearchUriBuilder $searchUriBuilder
     */
    public function injectSearchUriBuilder(SearchUriBuilder $searchUriBuilder)
    {
        self::$searchUriBuilder = $searchUriBuilder;
    }

    /**
     * @return SearchUriBuilder|object
     */
    protected static function getSearchUriBuilder()
    {
        if (!isset(self::$searchUriBuilder)) {
            $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
            self::$searchUriBuilder = $objectManager->get(SearchUriBuilder::class);
        }

        return self::$searchUriBuilder;
    }

    /**
     * @param RenderingContextInterface $renderingContext
     * @return mixed
     */
    protected static function getUsedSearchRequestFromRenderingContext(RenderingContextInterface $renderingContext) {
        $resultSet = static::getUsedSearchResultSetFromRenderingContext($renderingContext);
        if (!$resultSet instanceof SearchResultSet) {
            throw new \InvalidArgumentException("The variable resultSet need to be defined in the scope of " . static::class);
        }

        return $resultSet->getUsedSearchRequest();
    }
}
