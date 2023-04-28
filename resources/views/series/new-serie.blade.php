<x-layout title="Nova Série">
    <form action="" class="form form-group" method="post">
        <div class="mb-3">
            <x-form.label for="name" class="form-label" text="Nome" />
            <x-form.input type="text" id="name" name="name" class="form-control" value="" />
        </div>
        <div class="">
            <a href="/series" class="btn btn-secondary">Voltar</a>
            <x-form.button id="enviar" class="btn btn-primary" text="Enviar" />
        </div>
    </form>
</x-layout>