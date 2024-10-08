<?php

namespace App\Models;

use function Laravel\Prompts\search;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'title', 'author_id', 'body', 'category_id'];
    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );
        $query->when($filters['category'] ?? false, fn ($query, $category)=>
            $query->whereHas('category', fn ($query)=>
                $query->where('slug', 'like', $category)
            )
        );
        $query->when($filters['author'] ?? false, fn ($query, $author)=>
            $query->whereHas('author', fn ($query)=>
                $query->where('username', 'like', $author)
            )
        );
    }
}
