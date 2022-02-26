<?php

declare(strict_types=1);

namespace Lolli\Dbhealth\Tests\Functional\Helper;

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

use Lolli\Dbhealth\Helper\TableHelper;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

class TableHelperTest extends FunctionalTestCase
{
    protected array $testExtensionsToLoad = [
        'typo3conf/ext/dbhealth',
    ];

    /**
     * @test
     */
    public function tableExistsInDatabaseReturnTrueForExistingTable(): void
    {
        /** @var ConnectionPool $connectionPool */
        $connectionPool = $this->getContainer()->get(ConnectionPool::class);
        self::assertTrue((new TableHelper($connectionPool))->tableExistsInDatabase('pages'));
    }

    /**
     * @test
     */
    public function tableExistsInDatabaseReturnFalseForNotExistingTable(): void
    {
        /** @var ConnectionPool $connectionPool */
        $connectionPool = $this->getContainer()->get(ConnectionPool::class);
        self::assertFalse((new TableHelper($connectionPool))->tableExistsInDatabase('i_do_not_exist'));
    }
}
