@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-3">Your Tasks</h4>

            @if ($tasks->isEmpty())
                <p class="text-muted mb-0">No tasks yet. Click "+ Add Task" to create your first one.</p>
            @else
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Task Name</th>
                                <th>Description</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->task_name }}</td>
                                    <td>{{ Str::limit($task->description, 40) ?: '—' }}</td>
                                    <td>{{ $task->due_date ? $task->due_date->format('M d, Y') : '—' }}</td>
                                    <td>
                                        <span class="badge {{ $task->status === 'Pending' ? 'badge-pending' : 'badge-completed' }}">
                                            {{ $task->status }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <form action="{{ route('tasks.updateStatus', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                Mark as {{ $task->status === 'Pending' ? 'Completed' : 'Pending' }}
                                            </button>
                                        </form>

                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('Delete this task?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
