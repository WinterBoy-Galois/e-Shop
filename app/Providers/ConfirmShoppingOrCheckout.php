<?php

namespace App\Providers;

use App\Providers\ProductAddedToCart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ConfirmShoppingOrCheckout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductAddedToCart  $event
     * @return void
     */
    public function handle(ProductAddedToCart $event)
    {
        //
    }
}
