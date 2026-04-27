<x-app-layout>
    <ul>
    @foreach ($events as $event)
       <li>{{$event->showInfo()}}</li>
    @endforeach
    </ul>
</x-app-layout>