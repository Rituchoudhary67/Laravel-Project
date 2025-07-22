@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>All Contacts</h2>
    <a href="{{ route('contacts.create') }}" class="btn btn-success mb-3">➕ Add Contact</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($contacts->isEmpty())
        <p>No contacts found.</p>
    @else 
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact) 
                <tr>
                    <td>
                        @if($contact->photo)
                            <img src="{{ asset('images/contacts/' . $contact->photo) }}" width="50" height="50">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->address }}</td>
                    <td>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
