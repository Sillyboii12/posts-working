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
        <option value="draft" >draft</option>
        <option value="published" >published</option>
        <option value="archived" >archived</option>
    </select>

    <button type="submit">Change</button>
</form>
</x-app-layout>
