<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductOfferStorage\Dependency\Facade;

interface ProductOfferStorageToEventBehaviorFacadeInterface
{
    /**
     * @param array<\Generated\Shared\Transfer\EventEntityTransfer> $eventTransfers
     * @param string $columnName
     *
     * @return array<mixed>
     */
    public function getEventTransfersAdditionalValues(array $eventTransfers, string $columnName): array;

    /**
     * @param array<\Generated\Shared\Transfer\EventEntityTransfer> $eventTransfers
     *
     * @return array<int>
     */
    public function getEventTransferIds(array $eventTransfers): array;

    /**
     * @param array<\Generated\Shared\Transfer\EventEntityTransfer> $eventTransfers
     * @param string $foreignKeyColumnName
     *
     * @return array<int>
     */
    public function getEventTransferForeignKeys(array $eventTransfers, string $foreignKeyColumnName): array;
}
