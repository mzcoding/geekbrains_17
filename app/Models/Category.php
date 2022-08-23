<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    private static $selectedFields = ['id', 'title', 'description', 'created_at'];

    public function getCategories(): Collection
    {
        return DB::table($this->table)->get(self::$selectedFields);
    }

    public function getCategoryById(int $id): ?object
    {
        return DB::table($this->table)->find($id, self::$selectedFields);
    }
}
