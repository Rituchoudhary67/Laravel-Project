@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Contact</h2>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $contact->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $contact->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <textarea name="address" class="form-control" required>{{ $contact->address }}</textarea>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo:</label>
            <input type="file" name="photo" class="form-control">
            @if($contact->photo)
                <p class="mt-2">Current: <img src="{{ asset('images/contacts/' . $contact->photo) }}" width="50" height="50"></p>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Contact</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
