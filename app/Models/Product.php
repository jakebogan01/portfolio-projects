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
        if (isset($filters['price'])) {
            $price = $filters['price'];
            if ($price === 'high') {
                $query->orderBy('price', 'desc');
            } elseif ($price === 'low') {
                $query->orderBy('price', 'asc');
            }
        }

        if (isset($filters['color'])) {
            $colors = explode(',', $filters['color']);
            $query->whereIn('color', $colors);
        }

        if (isset($filters['size'])) {
            $sizes = explode(',', $filters['size']);
            $query->whereIn('size', $sizes);
        }
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
