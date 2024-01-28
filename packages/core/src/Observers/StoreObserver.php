<?php

namespace Lunar\Observers;

use Lunar\Models\Store;

class StoreObserver
{
    /**
     * Handle the Store "creating" event.
     *
     * @return void
     */
    public function creating(Store $store)
    {
        $store->addBlamables();
    }

    /**
     * Handle the Store "updating" event.
     *
     * @return void
     */
    public function updating(Store $store)
    {
        $store->addBlamable(field: 'updated_by');
    }
}
