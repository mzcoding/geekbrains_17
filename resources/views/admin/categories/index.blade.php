@extends('layouts.admin')
@section('content')
    <h2>Список категорий</h2>
    <a href="{{ route('admin.categories.create') }}" style="float:right;" class="btn btn-primary">Добавить категорию</a>


<br><br>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title}}</td>
                    <td>{{ $category->created_at }}</td>
                    <td><a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Ред.</a> &nbsp; <a href="" style="color: red;">Уд.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Записе не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
