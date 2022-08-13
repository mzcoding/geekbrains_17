@extends('layouts.admin')
@section('content')
    <h2>Список новостей</h2>
    <div class="table-responsive">
        @include('inc.message', ['message' => 'Это сообщение об ошибки в новостях'])
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Автор</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $key => $news)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $news['title'] }}</td>
                <td>{{ $news['author'] }}</td>
                <td>DRAFT</td>
                <td>{{ $news['created_at']->format('d-m-Y H:i') }}</td>
                <td><a href="{{ route('admin.news.edit', ['news' => $key]) }}">Ред.</a> &nbsp; <a href="" style="color: red;">Уд.</a></td>
            </tr>
            @empty
                <tr>
                    <td colspan="6">Записе не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
