<?php

namespace Lunar\Base;

use Illuminate\Database\Eloquent\Model;
use Lunar\Base\Traits\HasModelExtending;

abstract class BaseModel extends Model
{
    use HasModelExtending;

    /**
     * Create a new instance of the Model.
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('lunar.database.table_prefix').$this->getTable());

        if ($connection = config('lunar.database.connection', false)) {
            $this->setConnection($connection);
        }
    }

    /**
     * Add created_by and updated_by fields.
     */
    public function addBlamables()
    {
        $this->created_by = auth()->id() ?? null;
        $this->updated_by = auth()->id() ?? null;
    }

    /**
     * Add either created_by or updated_by fields.
     * @Attribute string $field creator field
     */
    public function addBlamable($field = 'created_by')
    {
        $this->{$field} = auth()->id() ?? null;
    }
}
