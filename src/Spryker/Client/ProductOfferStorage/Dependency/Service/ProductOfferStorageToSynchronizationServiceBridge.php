<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ProductOfferStorage\Dependency\Service;

use Spryker\Service\Synchronization\Dependency\Plugin\SynchronizationKeyGeneratorPluginInterface;

class ProductOfferStorageToSynchronizationServiceBridge implements ProductOfferStorageToSynchronizationServiceInterface
{
    /**
     * @var \Spryker\Service\Synchronization\SynchronizationServiceInterface
     */
    protected $synchronizationService;

    /**
     * @param \Spryker\Service\Synchronization\SynchronizationServiceInterface $synchronizationService
     */
    public function __construct($synchronizationService)
    {
        $this->synchronizationService = $synchronizationService;
    }

    /**
     * @param string $resourceName
     *
     * @return \Spryker\Service\Synchronization\Dependency\Plugin\SynchronizationKeyGeneratorPluginInterface
     */
    public function getStorageKeyBuilder(string $resourceName): SynchronizationKeyGeneratorPluginInterface
    {
        return $this->synchronizationService->getStorageKeyBuilder($resourceName);
    }
}
