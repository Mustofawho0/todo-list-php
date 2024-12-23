@extends('layouts.app')

@section('content')
    @include('form', ['todos' => $todo])
@endsection
