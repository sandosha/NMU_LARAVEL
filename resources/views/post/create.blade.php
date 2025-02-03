@extends("layouts.app")
@section('title',"Add Posts")
@section('content')
Add New Post
<form action="/posts" method="POST">
    @csrf
    <label class="form-label">Title</label>

    <input type="text" name="title" class="form-control" placeholder="Title"><br>
    <label class="form-label">Body</label>
    <input type="text" name="body" class="form-control" placeholder="Body"><br>

    <input type="submit" value="Add" class="btn btn-primary">


</form>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection