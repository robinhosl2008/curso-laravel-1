<x-layout :title="$title">
    @isset($msg)
    <div class="alert alert-success">
        {{ $msg }}
    </div>
    @endisset
    
    <form method="post" class="form form-group w-25" action="{{ route('register') }}">
        @csrf

        <div>
            <div class="row">
                <x-form.label for="name" class="form-label" text="Nome" />
                <x-form.input type="text" id="name" name="name" class="form-control" value="" />
            </div>
            <div class="row">
                <x-form.label for="email" class="form-label" text="E-mail" />
                <x-form.input type="text" id="email" name="email" class="form-control" value="" />
            </div>
            <div class="row">
                <x-form.label for="password" class="form-label" text="Senha" />
                <x-form.input type="text" id="password" name="password" class="form-control" value="" />
            </div>
            <div class="row mt-2">
                <x-form.button id="submit" class="btn btn-primary" text="Registrar" />
            </div>
        </div>
    </form>
</x-layout>