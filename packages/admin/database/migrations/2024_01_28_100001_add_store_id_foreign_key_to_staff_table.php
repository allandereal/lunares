<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lunar\Base\Migration;

class AddStoreIdForeignKeyToStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->prefix.'staff', function (Blueprint $table) {
            $table->foreign('store_id')
                ->references('id')
                ->on($this->prefix.'stores')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->prefix.'staff', function (Blueprint $table) {
            $table->dropForeign('store_id');
        });
    }
}
