@extends('layouts.admin')
@section('content')
   @php $message = "Test message"; @endphp
   <br>
   <a href="{{ route('admin.parser') }}">Парсить новости</a>
@endsection
