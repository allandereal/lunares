<?php

namespace Lunar\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Lunar\Base\BaseModel;
use Lunar\Base\Traits\LogsActivity;
use Lunar\Base\Traits\Searchable;
use Lunar\Database\Factories\StoreFactory;

/**
 * @property int $id
 * @property ?string $name
 * @property ?string $email
 * @property ?string $phone
 * @property ?string $address
 * @property ?string $logo
 * @property boolean $status
 * @property ?array $content
 * @property ?int $created_by
 * @property ?int $updated_by
 * @property ?Carbon $created_at
 * @property ?Carbon $updated_at
 * @property ?Carbon $deleted_at
 */
class Store extends BaseModel
{
    use HasFactory;
    use LogsActivity;
    use Searchable;
    use SoftDeletes;

    /**
     * Return a new factory instance for the model.
     */
    protected static function newFactory(): StoreFactory
    {
        return StoreFactory::new();
    }

    /**
     * Define which attributes should be
     * fillable during mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'logo',
        'address',
        'status',
        'content',
    ];

    /**
     * Define which attributes should be cast.
     *
     * @var array
     */
    protected $casts = [
        'content' => 'json',
    ];

    /**
     * Return related products relation.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Apply the status scope.
     */
    public function scopeStatus(Builder $query, string $status): Builder
    {
        return $query->whereStatus($status);
    }

    /**
     * Return active stores.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->whereStatus(1);
    }
}
