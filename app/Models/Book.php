<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'pages',
        'cover',
        'author',
        'amount',
        'release_date',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'book_categories');
    }

    public function own(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'owned')->withTimestamps();
    }

    public function scopeSearch($query, string $search = '')
    {
        $query->where('title', 'like', "%{$search}%");
    }

    public function scopeWithCategory($query, string $category)
    {
        $query->whereHas('categories', function ($query) use ($category) {
            $query->where('category_id', $category);
        });
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getCover()
    {
        $isUrl = str_contains($this->cover, 'http');

        return ($isUrl) ? $this->cover : Storage::url($this->cover);
    }

}
