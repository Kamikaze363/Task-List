@extends('layouts.app')

@section('title', 'List of tasks')

@section('content')

    <div>
        <a href="{{route('tasks.create')}}">Create new task</a>
    </div>

    @forelse ($tasks as $task)
        <div>
            <a href="{{route('tasks.show', ['task' => $task])}}">{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    @if ($tasks->count())
        <div>
            {{ $tasks->links() }}
        </div>
    @endif
@endsection
