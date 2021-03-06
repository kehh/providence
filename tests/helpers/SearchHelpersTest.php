<?php
/** ---------------------------------------------------------------------
 * tests/helpers/SearchHelpersTest.php
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2015 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 * 
 * @package CollectiveAccess
 * @subpackage tests
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License version 3
 * 
 * ----------------------------------------------------------------------
 */
use PHPUnit\Framework\TestCase;

require_once(__CA_APP_DIR__."/helpers/searchHelpers.php");
require_once(__CA_BASE_DIR__.'/tests/testsWithData/BaseTestWithData.php');

class SearchHelpersTest extends TestCase {
	# -------------------------------------------------------
	public function testESDateRewrite() {
		// day-less
		$this->assertEquals('2014-04-01T00:00:00Z', caRewriteDateForElasticSearch('2014-04-00T00:00:00Z', true));
		$this->assertEquals('2014-04-30T00:00:00Z', caRewriteDateForElasticSearch('2014-04-00T00:00:00Z', false));

		// month- and day-less
		$this->assertEquals('2014-01-01T00:00:00Z', caRewriteDateForElasticSearch('2014-00-00T00:00:00Z', true));
		$this->assertEquals('2014-12-31T00:00:00Z', caRewriteDateForElasticSearch('2014-00-00T00:00:00Z', false));

	}
	# -------------------------------------------------------

	public function testCaSearchIsForSetsFuzzySearchNoSet() {
        $result = caSearchIsForSets('centro~');
        $this->assertEmpty($result);
	}
	# -------------------------------------------------------
}
