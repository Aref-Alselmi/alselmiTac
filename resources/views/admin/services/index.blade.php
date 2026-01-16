@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Services</h1>

    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        Add Service
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->title }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $service->image) }}" width="80">
                    </td>
                    <td>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
