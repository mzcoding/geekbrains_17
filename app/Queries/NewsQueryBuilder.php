<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

final class NewsQueryBuilder
{
    private Builder $model;
    public function __construct()
    {
        $this->model = News::query();
    }

    public function getNews(): Collection|LengthAwarePaginator
    {
       return $this->model
           ->status()
           ->with('category')
           ->paginate(config('pagination.admin.news'));
    }

    public function create(array $data): News|bool
    {
        return News::create($data);
    }

    public function update(News $news, array $data): bool
    {
        return $news->fill($data)->save();
    }
}
