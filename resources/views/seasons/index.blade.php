<x-layout :title="$title">
    <ul class="list-group">
        @foreach($seasons as $key => $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <form method="post" class="mr-2" action="{{ route('episodes.index', $season->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-info btn-sm">Temporada {{ $key + 1 }}</button>
                    </form>
                </div>

                <span class="bg-secundary">
                    {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>

</x-layout>