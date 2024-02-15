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

        if (isset($filters['rating'])) {
            $rating = $filters['rating'];
            if ($rating === 'popular') {
                $query->orderBy('rating', 'desc');
            } elseif ($rating === 'unpopular') {
                $query->orderBy('rating', 'asc');
            }
        }

        $filtersToApply = ['color', 'size', 'gender', 'age', 'style', 'brand', 'shape'];

        foreach ($filtersToApply as $filterKey) {
            if (isset($filters[$filterKey])) {
                $values = explode(',', $filters[$filterKey]);
                $query->whereIn($filterKey, $values);
            }
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
