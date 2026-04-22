<x-app-layout>
    <ul>
        @foreach ($cars as $car)
            <li>{!! $car->toHTML() !!}</li>
        @endforeach
    </ul>
</x-app-layout>