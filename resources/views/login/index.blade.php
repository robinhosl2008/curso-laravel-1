<x-layout :title="$title">
    @isset($msg)
    <div class="alert alert-success">
        {{ $msg }}
    </div>
    @endisset
    
    <form method="post" class="form form-group w-25" action="{{ route('auth') }}" style="">
        @csrf

        <div>
            <div class="row">
                <x-form.label for="email" class="form-label" text="E-mail" />
                <x-form.input type="text" id="email" name="email" class="form-control" value="" />
            </div>
            <div class="row">
                <x-form.label for="password" class="form-label" text="Senha" />
                <x-form.input type="text" id="password" name="password" class="form-control" value="" />
            </div>
            <div class="row mt-2">
                <x-form.button id="submit" class="btn btn-primary" text="Entrar" />
            </div>
            <div class="row mt-2">
                <a href="{{ route('registry') }}">Registre-se</a>
            </div>
        </div>
    </form>
</x-layout>