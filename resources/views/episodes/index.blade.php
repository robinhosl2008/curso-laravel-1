<x-layout :title="$title">

    @isset($msg)
    <div class="alert alert-success">
        {{ $msg }}
    </div>
    @endisset
    
    <ul class="list-group">
        @foreach($episodes as $key => $episode)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-info btn-sm">Episódio {{ $key + 1 }}</button>
            </li>
        @endforeach
    </ul>

</x-layout>