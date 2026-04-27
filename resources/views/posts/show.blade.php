<x-app-layout>
    <a href="{{route('posts.index')}}">All posts</a>
    <h1>Title: {{ $post->title }}</h1>
    <p>Content: {{ $post->content }}</p>

    <br>

    <form action="{{ route('posts.status', $post) }}" method="POST">
    @csrf
    @method('Patch')

    <label for="status">Change post status</label>
    <select name="status" id="status">
        <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>draft</option>
        <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>published</option>
        <option value="archived" {{ $post->status == 'archived' ? 'selected' : '' }}>archived</option>
    </select>
    <button type="submit">Change</button>
    <br>
    <br>
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
</form>
</x-app-layout>
