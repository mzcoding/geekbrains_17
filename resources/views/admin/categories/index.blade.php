@extends('layouts.admin')
@section('content')
    <h2>Список категорий</h2>
    <a href="{{ route('admin.categories.create') }}" style="float:right;" class="btn btn-primary">Добавить категорию</a>
    <div class="table-responsive">
    </div>
@endsection