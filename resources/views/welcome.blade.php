@extends('layouts.app')

@section('title', 'My Todo')


{{-- @if (count($todos))
        @foreach ($todos as $todo)
            <p>{{ $todo->title }}</p>
        @endforeach
    @else
        <div>No Todo List</div>
    @endif --}}
@section('content')

    <div class="my-5">
        <a href="{{ route('todo.create') }}">
            <button class="btn btn-neutral btn-sm text-white">Create
                Todo</button>
        </a>
    </div>

    @forelse($todos as $todo)
        <p class="my-2">
            <span>{{ $todo->id }}. </span>
            <a class="{{ $todo->completed ? 'line-through hover:line-through' : '' }} hover:underline hover:text-sky-400"
                href="{{ route('todo.show', ['todo' => $todo]) }}">{{ $todo->title }}</a>
        </p>
    @empty
        <p class="flex justify-center">No ToDo List!</p>
    @endforelse

    @if ($todos->count())
        <nav class="mt-5 text-gray-800">
            {{ $todos->links() }}
        </nav>
    @endif
@endsection
