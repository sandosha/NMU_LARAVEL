index page
@extends("layouts.app")
@section('title',"list All Posts")
@section('content')
<a href="/posts/create">Create Post</a>
<table class="table">
    @foreach($posts as $post)
    <tr>
        <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</td>
        <td>{{ $post->created_at->diffForHumans() }}</td>

        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>{{optional($post->user)->name}}</td>
        <td>
            <a href=" /posts/{{$post['id']}}" class="btn btn-primary">Read</a>
        </td>
        <td>
            <a href="/posts/{{$post['id']}}/edit" class="btn btn-danger">Update</a>
        </td>
        <td>
            <form action="/posts/{{$post['id']}}" method="post">
                @method("delete")
                @csrf
                <input type="submit" value="Delete" class="btn btn-success">
            </form>
        </td>
    </tr>
    <div class="d-flex justify-content-center mt-3">
        {{ $posts->links() }}
    </div>
    @endforeach
</table>
@endsection
