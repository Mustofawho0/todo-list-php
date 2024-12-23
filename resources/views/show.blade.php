@extends('layouts.app')

@section('title', $todo->title)

@section('content')
    <div class="pt-4">
        <a class="text-gray-700 hover:text-sky-400 hover:underline" href="{{ route('todo.index') }}">← Back to Todo List</a>
    </div>
    <p class="py-4">{{ $todo->description }}</p>

    @if ($todo->long_desc)
        <p>{{ $todo->long_desc }}</p>
    @else
        <p class="text-yellow-500 font-semibold">No Long Description</p>
    @endif

    <div class="py-4 text-sm font-medium">
        <span>Created : {{ $todo->created_at->diffForHumans() }}
        </span> | <span>Updated : {{ $todo->updated_at->diffForHumans() }}
        </span>
    </div>

    @if ($todo->completed)
        <span class="text-green-500">Completed 😻</span>
    @else
        <span class="text-red-500">Not Completed 😿</span>
    @endif

    <div class="py-4">
        <form method="POST" action="{{ route('todo.toggle-completed', ['todo' => $todo]) }}">
            @csrf
            @method('PUT')
            <button
                class="{{ $todo->completed ? 'btn btn-error btn-sm text-white' : 'btn btn-accent btn-sm text-white' }}">Mark
                as {{ $todo->completed ? 'Not Completed' : 'Completed' }}</button>
        </form>
    </div>


    <div class="flex gap-4">
        <a href="{{ route('todo.edit', ['todo' => $todo]) }}">
            <button class="btn btn-info btn-sm text-white">Edit Todo</button>
        </a>
        <form method="POST" action="{{ route('todo.destroy', ['todo' => $todo]) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-error btn-sm text-white" type="submit">Delete Todo</button>
        </form>
    </div>


    <br>
@endsection
