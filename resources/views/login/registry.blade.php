<x-layout :title="$title">
    @isset($msg)
    <div class="alert alert-success">
        {{ $msg }}
    </div>
    @endisset
    
    <form method="post" class="form form-group w-100 mt-5" action="{{ route('register') }}">
        @csrf

        <div class="w-50 m-auto">
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
                <div class="col-6" style="padding-left: 0px;">
                    <a href="{{ route('login') }}" id="voltar" class="btn btn-secondary w-100">Voltar</a>
                </div>
                <div class="col-6" style="padding-right: 0px;">
                    <x-form.button id="submit" class="btn btn-primary w-100" text="Registrar" />
                </div>
            </div>
        </div>
    </form>
</x-layout>