@extends('layouts.admin')
@section('content')
   @php $message = "Test message"; @endphp
   <br>
   <x-alert type="warning" :message="$message"></x-alert>
   <x-alert type="success" :message="$message"></x-alert>
   <x-alert type="primary" :message="$message"></x-alert>
   <x-alert type="danger" :message="$message"></x-alert>
   <x-alert type="info" :message="$message"></x-alert>
@endsection