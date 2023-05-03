<x-layout title="Nova Série">
    <form action="{{ route('series.salvar-editado') }}" class="form form-group" method="post">
        @csrf

        <x-form.input type="hidden" id="id" name="id" class="" value="{{ $id }}" />

        <div class="row">
            <div class="col-8">
                <x-form.label for="name" class="form-label" text="Nome" />
                <x-form.input type="text" id="name" name="name" class="form-control" value="{!! $name !!}" />
            </div>

            <!-- <div class="col-2">
                <x-form.label for="name" class="form-label" text="numero" />
                <x-form.input type="text" id="name" name="name" class="form-control" value="{{ $name }}" />
            </div>

            <div class="col-2">
                <x-form.label for="name" class="form-label" text="episodio" />
                <x-form.input type="text" id="name" name="name" class="form-control" value="{{ $name }}" />
            </div> -->
        </div>

            <div class="mt-2">
                <a href="{{ route('series.listar') }}" class="btn btn-secondary">Voltar</a>
                <x-form.button id="enviar" class="btn btn-primary" text="Enviar" />
            </div>
    </form>
</x-layout>