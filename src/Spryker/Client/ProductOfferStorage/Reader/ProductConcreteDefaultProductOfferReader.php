<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ProductOfferStorage\Reader;

use Generated\Shared\Transfer\ProductOfferStorageCriteriaTransfer;

class ProductConcreteDefaultProductOfferReader implements ProductConcreteDefaultProductOfferReaderInterface
{
    /**
     * @var array<\Spryker\Client\ProductOfferStorageExtension\Dependency\Plugin\ProductOfferReferenceStrategyPluginInterface>
     */
    protected $defaultProductOfferPlugins;

    /**
     * @param array<\Spryker\Client\ProductOfferStorageExtension\Dependency\Plugin\ProductOfferReferenceStrategyPluginInterface> $defaultProductOfferPlugins
     */
    public function __construct(array $defaultProductOfferPlugins)
    {
        $this->defaultProductOfferPlugins = $defaultProductOfferPlugins;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductOfferStorageCriteriaTransfer $productOfferStorageCriteriaTransfer
     *
     * @return string|null
     */
    public function findProductOfferReference(ProductOfferStorageCriteriaTransfer $productOfferStorageCriteriaTransfer): ?string
    {
        foreach ($this->defaultProductOfferPlugins as $defaultProductOfferPlugin) {
            if ($defaultProductOfferPlugin->isApplicable($productOfferStorageCriteriaTransfer)) {
                return $defaultProductOfferPlugin->findProductOfferReference($productOfferStorageCriteriaTransfer);
            }
        }

        return null;
    }
}
