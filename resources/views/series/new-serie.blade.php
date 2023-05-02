<x-layout title="Nova Série">
    <form action="{{ route('series.salvar') }}" class="form form-group" method="post">
        @csrf
        <div class="mb-3">
            <x-form.label for="name" class="form-label" text="Nome" />
            <x-form.input type="text" id="name" name="name" class="form-control" value="{{ $name }}" />
            <x-form.input type="hidden" id="id" name="id" class="" value="{{ $id }}" />
        </div>
        <div class="">
            <a href="{{ route('series.listar') }}" class="btn btn-secondary">Voltar</a>
            <x-form.button id="enviar" class="btn btn-primary" text="Enviar" />
        </div>
    </form>
</x-layout>