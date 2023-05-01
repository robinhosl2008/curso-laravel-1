<x-layout :title="$title" :series="$series">
    <a href="{{ route('series.adicionar') }}">
        <x-form.button id="" class="btn btn-primary mb-2" text="Adicionar uma nova série"/>
    </a>
    
    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item">{{ $serie->name }}</li>
        @endforeach
    </ul>
</x-layout>