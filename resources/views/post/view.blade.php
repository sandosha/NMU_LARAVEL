View Post
@extends("layouts.app")
@section('title',"View Posts")
@section('content')
<p> Published in : {{ $post->created_at->format('d M Y') }}</p>
<p>({{ $post->created_at->diffForHumans() }})</p>

<ul class="list-group">
    <li class="list-group-item">{{$post->id}}</li>
    <li class="list-group-item">{{$post->title}}</li>
    <li class="list-group-item">{{$post->body}}</li>
</ul>

@endsection