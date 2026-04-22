<x-app-layout>
    <h1>Edit post</h1>

    <form  action="{{route('posts.update', $post)}}" method="post">
        @csrf
        @method('put')
        <label for="title">Title: </label>
        <input type="text" id="title" name="title" value="{{ old('title') ?? $post->title }}">
        <br>
        <label for="content">Content: </label>
        <textarea name="content" id="content">{{ old('content') ?? $post->content }}</textarea>
        <br>
        <input id="editButton" type="submit" value="Update">
        @error('title')
            <p>{{ $message }}</p>
        @enderror
        @error('content')
            <p>{{ $message }}</p>
        @enderror
    </form>
</x-app-layout>
