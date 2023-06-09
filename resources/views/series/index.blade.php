<x-layout :title="$title" :series="$series">
    <a href="{{ route('series.form-adicionar') }}">
        <x-form.button id="" class="btn btn-primary mb-2" text="Adicionar uma nova série"/>
    </a>

    @isset($msg)
    <div class="alert alert-success">
        {{ $msg }}
    </div>
    @endisset
    
    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('seasons.index', $serie->id) }}">
                    {{ $serie->name }}
                </a>

                <div class="d-flex">
                    <form method="post" class="mr-2" action="{{ route('series.editar') }}">
                        @csrf
                        <x-form.input type="hidden" id="id" name="id" class="" value="{{ $serie->id }}" />
                        <button type="submit" class="btn btn-info btn-sm">Editar</button>
                    </form>

                    <form method="post" action="{{ route('series.remover', $serie->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Remover</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>