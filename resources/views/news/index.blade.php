@extends('layouts.main')
@section('title') Список новостей @parent @endsection
@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($newsList as  $news)
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{ Storage::disk('public')->url($news->image) }}" style="width:350px;">

                <div class="card-body">
                    <h2>{{ $news->title }}</h2>
                    <p class="card-text">{!! $news->description !!}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('news.show', ['news' => $news]) }}" class="btn btn-sm btn-outline-secondary">Смотреть подробнее</a>
                        </div>
                        <small class="text-muted">{{ $news->author }} - {{ $news->created_at->format('d-m-Y H:i') }}</small>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <h2>Записей нет</h2>
        @endforelse


    </div>
    {{ $newsList->links() }}
@endsection





