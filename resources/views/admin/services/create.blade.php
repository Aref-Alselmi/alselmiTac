@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add New Service</h1>

    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('admin.services.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="contact-form"
    >
        @csrf

        <div class="form-group">
            <label>Service Title</label>
    <input
        type="text"
        name="title"
        value="{{ old('title') }}"
        required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4" required></textarea>
        </div>
<div class="form-group">
    <label for="details">Service Details</label>
    <textarea
        name="details"
        id="details"
        rows="6"
        placeholder="Write full details about this service (scope, benefits, process, etc.)"
    ></textarea>
</div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" required>
        </div>

        <button class="btn-submit">Save Service</button>
    </form>

</div>
@endsection
