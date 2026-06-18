<?php

declare(strict_types=1);

namespace Swag\AmazonPay\Components\Button\Pay\Hydrator;

use Shopware\Core\Framework\Context;
use Swag\AmazonPay\Components\Button\Pay\Struct\AmazonPayButtonPayloadStruct;

interface AmazonPayButtonPayloadHydratorInterfaceV2
{
    public const DEFAULT_SIGN_IN_SCOPES = [
        'email',
        'shippingAddress',
    ];

    public function hydratePayload(string $salesChannelId, Context $context, bool $oneClickCheckout = false, ?string $customReviewUrl = null): ?AmazonPayButtonPayloadStruct;
}
