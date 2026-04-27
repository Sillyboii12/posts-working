<x-app-layout>
    <h1>All posts</h1>
    <a href="{{route('posts.create')}}">Create post</a>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <ul>
        @foreach($posts as $post)
            <li>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <div>
                    <a  id= "showButton" href="{{route('posts.show', $post)}}">Show</a>
                    <a  href="{{route('posts.edit', $post)}}">Edit</a>
                    <form id="deleteButton" action="{{route('posts.destroy', $post)}}" method="post">
                        @csrf
                        @method('delete')
                        <input id= "deleteImprove" type="submit" value="Delete">
                    </form>
                    <form id="deleteButton" action="{{route('posts.duplicate', $post)}}" method="post">
                        @csrf
                        <input id= "deleteImprove" type="submit" value="Duplicate">
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <br>
@if ($posts->onFirstPage() == false)
    <a href="{{ $posts->previousPageUrl() }}">Previous</a>
@endif

@if ($posts->hasMorePages())
    <a href="{{ $posts->nextPageUrl() }}">Next</a>
@endif
</x-app-layout>
