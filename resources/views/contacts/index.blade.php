<x-app-layout>
    <h1>Feedback</h1>


    <ul>
        @foreach ($contacts as $contact)
        <li>{{$contact->content}}</li>
        @endforeach
    </ul>


</x-app-layout>