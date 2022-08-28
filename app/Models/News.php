<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class News extends Model
{
    use HasFactory;

    public const DRAFT = 'DRAFT';
    public const ACTIVE = 'ACTIVE';
    public const BLOCKED = 'BLOCKED';

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'author',
        'status',
        'image',
        'description'
    ];

   //todo: fix it in the future
   /* protected $casts = [
        'is_admin' => 'bool'
    ]; */

    public function scopeStatus(Builder $query): Builder
    {
        return $query->where('status', News::DRAFT)
            ->orWhere('status', News::ACTIVE);
    }

    //Relations

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
