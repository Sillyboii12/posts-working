<x-app-layout>
    <h1>Contact</h1>

    <form action="{{route('contact.store')}}" method="post">
        @csrf
        <label for="name">Name: </label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
        <br>
        <label for="email">Email: </label>
        <input type="text" id="email" name="email" value="{{ old('email') }}">
        <br>
        <label for="content">Reply: </label>
        <textarea name="content" id="content">{{ old('content') }}</textarea>
        <br>
        <input type="submit" value="Create">

        @error('name')
            <p>{{ $message }}</p>
        @enderror
        @error('email')
            <p>{{ $message }}</p>
        @enderror
        @error('content')
            <p>{{ $message }}</p>
        @enderror
    </form>
</x-app-layout>