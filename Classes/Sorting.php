<?php
namespace ApacheSolrForTypo3\Solr;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011-2012 Stefan Sprenger <stefan.sprenger@dkd.de>
 *  (c) 2012-2015 Ingo Renner <ingo@typo3.org>
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

use ApacheSolrForTypo3\Solr\Domain\Search\ResultSet\Sorting\SortingHelper;

/**
 * Utility class for sorting.
 *
 * @author Stefan Sprenger <stefan.sprenger@dkd.de>
 */
class Sorting extends SortingHelper
{

    /**
     * Constructor
     *
     * @param array $sortingConfiguration Raw configuration from plugin.tx_solr.search.sorting.options
     */
    public function __construct(array $sortingConfiguration)
    {
        trigger_error('ApacheSolrForTypo3\Solr\Sorting is deprecated please use ApacheSolrForTypo3\Domain\Search\ResultsSet\Sorting\SortingHelper now', E_USER_DEPRECATED);
        parent::__construct($sortingConfiguration);
    }
}