<x-app-layout>
    <h1>Create post</h1>

    <form action="{{route('posts.store')}}" method="post">
        @csrf
        <label for="title">Title: </label>
        <input type="text" id="title" name="title" value="{{ old('title') }}">
        <br>
        <label for="content">Content: </label>
        <textarea name="content" id="content">{{ old('content') }}</textarea>
        <br>
        <input type="submit" value="Create">

        @error('title')
            <p>{{ $message }}</p>
        @enderror
        @error('content')
            <p>{{ $message }}</p>
        @enderror
    </form>
</x-app-layout>
