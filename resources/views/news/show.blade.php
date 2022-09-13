@extends('layouts.main')
@section('title') Новость - {{ $news->title }} @parent @endsection
@section('content')
<div style="border: 1px solid green;">
	<h2> {{ $news->title }}</h2>
	<p>{{ $news->author }} - {{ $news->created_at->format('d-m-Y H:i') }}</p>
	<p>{!! $news->description  !!}</p>
</div>
@endsection
