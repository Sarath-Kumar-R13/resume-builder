@extends('admin.layout')

@section('content')

<h2 class="mb-4">Template</h2>

<form method="POST" action="{{ route('admin.templates.store') }}" class="mb-4">
    @csrf
    <div class="d-flex gap-2">
        <input type="text" name="name" class="form-control" placeholder="Template Name">
        <button class="btn btn-primary">Add Template</button>
    </div>
</form>

<div class="card card-glass p-4">
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($templates as $template)
            <tr>
                <td>{{ $template->name }}</td>
                <td>
                    @if($template->is_active)
                        <span class="text-success">Active</span>
                    @else
                        <span class="text-danger">Inactive</span>
                    @endif
                </td>
                <td class="d-flex gap-2">
                    <form method="POST" action="{{ route('admin.templates.toggle',$template->id) }}">
                        @csrf
                        <button class="btn btn-sm btn-warning">
                            Toggle
                        </button>
                    </form>

                    <form method="POST" action="{{ route('admin.templates.delete',$template->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">No templates found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection