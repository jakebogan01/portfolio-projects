<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'images' => 'array',
    ];

    protected $with = ['project', 'category'];

    /**
     * @param $query
     * @param array $filters
     * @return void
     */
    public function scopeFilter($query, array $filters): void
    {
        // if price exists in filters, then query for higher than or equal to price
        $query->when($filters['price'] ?? false, function ($query, $price) {
            $query->where('price', '>=', $price);
        });
    }

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

//    $refund = Refund::create([
//    'images' => json_encode($images),
//    ]);
}
