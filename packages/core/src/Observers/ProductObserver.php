<?php

namespace Lunar\Observers;

use Lunar\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "creating" event.
     *
     * @return void
     */
    public function creating(Product $product)
    {
        $product->addBlamables();
    }

    /**
     * Handle the Product "updating" event.
     *
     * @return void
     */
    public function updating(Product $product)
    {
        $product->addBlamable(field: 'updated_by');
    }
}
