<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductOfferStorage\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\ProductOfferStorageTransfer;
use Generated\Shared\Transfer\ProductOfferTransfer;
use Generated\Shared\Transfer\StoreTransfer;
use Orm\Zed\ProductOffer\Persistence\SpyProductOffer;
use Orm\Zed\Store\Persistence\SpyStore;

class ProductOfferStorageMapper
{
    /**
     * @var array<\Spryker\Zed\ProductOfferStorageExtension\Dependency\Plugin\ProductOfferStorageMapperPluginInterface>
     */
    protected $productOfferStorageMapperPlugins;

    /**
     * @param array<\Spryker\Zed\ProductOfferStorageExtension\Dependency\Plugin\ProductOfferStorageMapperPluginInterface> $productOfferStorageMapperPlugins
     */
    public function __construct(array $productOfferStorageMapperPlugins)
    {
        $this->productOfferStorageMapperPlugins = $productOfferStorageMapperPlugins;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductOfferTransfer $productOfferTransfer
     * @param \Generated\Shared\Transfer\ProductOfferStorageTransfer $productOfferStorageTransfer
     *
     * @return \Generated\Shared\Transfer\ProductOfferStorageTransfer
     */
    public function mapProductOfferTransferToProductOfferStorageTransfer(
        ProductOfferTransfer $productOfferTransfer,
        ProductOfferStorageTransfer $productOfferStorageTransfer
    ): ProductOfferStorageTransfer {
        $productOfferStorageTransfer->fromArray($productOfferTransfer->toArray(), true);

        foreach ($this->productOfferStorageMapperPlugins as $productOfferStorageMapperPlugin) {
            $productOfferStorageTransfer = $productOfferStorageMapperPlugin->map($productOfferTransfer, $productOfferStorageTransfer);
        }

        $productOfferStorageTransfer->setProductConcreteSku($productOfferTransfer->getConcreteSku());

        return $productOfferStorageTransfer;
    }

    /**
     * @param \Orm\Zed\ProductOffer\Persistence\SpyProductOffer $productOfferEntity
     * @param \Generated\Shared\Transfer\ProductOfferTransfer $productOfferTransfer
     *
     * @return \Generated\Shared\Transfer\ProductOfferTransfer
     */
    public function mapProductOfferEntityToProductOfferTransfer(
        SpyProductOffer $productOfferEntity,
        ProductOfferTransfer $productOfferTransfer
    ): ProductOfferTransfer {
        $productOfferTransfer = $productOfferTransfer->fromArray(
            $productOfferEntity->toArray(),
            true,
        );

        return $productOfferTransfer;
    }

    /**
     * @param \Orm\Zed\Store\Persistence\SpyStore $storeEntity
     * @param \Generated\Shared\Transfer\StoreTransfer $storeTransfer
     *
     * @return \Generated\Shared\Transfer\StoreTransfer
     */
    public function mapStoreEntityToStoreTransfer(SpyStore $storeEntity, StoreTransfer $storeTransfer): StoreTransfer
    {
        return $storeTransfer->fromArray($storeEntity->toArray(), true);
    }
}
