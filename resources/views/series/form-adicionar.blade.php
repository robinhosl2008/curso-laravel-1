<x-layout title="Nova Série">
    <form action="{{ route('series.salvar-novo') }}" class="form form-group" method="post">
        @csrf

        <div class="row">
            <div class="col-8">
                <x-form.label for="name" class="form-label" text="Nome" />
                <x-form.input type="text" id="name" name="name" class="form-control" value="{{ $name }}" />
            </div>

            <div class="col-2">
                <x-form.label for="seasonsQtd" class="form-label" text="N° Temporadas" />
                <x-form.input type="text" id="seasonsQtd" name="seasonsQtd" class="form-control" value="" />
            </div>

            <div class="col-2">
                <x-form.label for="episodesQtd" class="form-label" text="Episódios" />
                <x-form.input type="text" id="episodesQtd" name="episodesQtd" class="form-control" value="" />
            </div>
        </div>

            <div class="mt-2">
                <a href="{{ route('series.listar') }}" class="btn btn-secondary">Voltar</a>
                <x-form.button id="enviar" class="btn btn-primary" text="Enviar" />
            </div>
    </form>
</x-layout>