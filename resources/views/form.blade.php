@extends('layouts.app')
@section('title', isset($todos) ? 'Update Todo List' : 'Create Todo List')

@section('content')
    <form method="POST" action="{{ isset($todos) ? route('todo.update', ['todo' => $todos->id]) : route('todo.store') }}">
        @csrf
        @isset($todos)
            @method('PUT')
        @endisset
        <div class="flex flex-col">
            <label class="w-[180px] label" for="title">Title</label>
            <div class="flex flex-col w-full">
                <input @class(['input-area', 'error-message-area' => $errors->has('title')]) type="text" name="title" id="title" placeholder="type title"
                    value="{{ $todos->title ?? old('title') }}">
                @error('title')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="py-4 flex flex-col">
            <label class="w-[180px] label" for="description">Description</label>
            <div class="flex flex-col w-full">
                <textarea @class([
                    'input-area w-full h-[100px]',
                    'error-message-area w-full h-[100px]' => $errors->has('description'),
                ]) name="description" id="description">{{ $todos->description ?? old('description') }}</textarea>
                @error('description')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-col">
            <label class="w-[180px] label" for="long_desc">Long Description</label>
            <textarea class="w-full h-[100px] input-area" name="long_desc" id="long_desc">{{ $todos->long_desc ?? old('long_desc') }}</textarea>
        </div>
        <div class="flex pt-4 gap-4 justify-center items-center">
            <button class="btn btn-neutral btn-sm text-white" type="submit">
                @isset($todos)
                    Update Todo
                @else
                    Add Todo
                @endisset
            </button>
            <a href="{{ route('todo.index') }}" class="btn btn-ghost btn-sm text-black">Cancel</a>
        </div>
    </form>
@endsection
