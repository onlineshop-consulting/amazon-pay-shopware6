<?php

declare(strict_types=1);

namespace Swag\AmazonPay\Components\Cart;

use Shopware\Core\Checkout\Cart\Cart;
use Shopware\Core\Checkout\Cart\SalesChannel\CartService as CoreCartService;
use Shopware\Core\Content\Product\State;
use Shopware\Core\System\SalesChannel\SalesChannelContext;

class CartService implements CartServiceInterface
{
    private CoreCartService $cartService;

    public function __construct(
        CoreCartService $cartService
    ) {
        $this->cartService = $cartService;
    }

    public function getCart(SalesChannelContext $context): Cart
    {
        return $this->cartService->getCart($context->getToken(), $context);
    }

    public function isCartIsEmpty(SalesChannelContext $context): bool
    {
        return $this->isCartEmpty($this->getCart($context));
    }

    public function hasCartPhysicalProducts(SalesChannelContext $context): bool
    {
        $cart = $this->getCart($context);

        return !$this->isCartEmpty($cart) && $cart->getLineItems()->hasLineItemWithState(State::IS_PHYSICAL);
    }

    protected function isCartEmpty(Cart $cart): bool
    {
        return empty($cart->getLineItems()->getElements());
    }
}
