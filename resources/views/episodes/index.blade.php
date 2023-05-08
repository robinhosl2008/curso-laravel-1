<x-layout :title="$title">

    @isset($msg)
    <div class="alert alert-success">
        {{ $msg }}
    </div>
    @endisset
    
    <ul class="list-group">
        @foreach($episodes as $key => $episode)
            <form method="post" class="mr-2" action="{{ route('episodes.check', [$episode->id]) }}">
                @csrf
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <x-form.input type="hidden" id="episode-{{ $episode->id }}" name="episode[]" class="" value="{{ $episode->id }}" />
                    <button type="submit" class="btn @if($episode->has_see == 1) btn-success @else btn-info @endif btn-sm">Episódio {{ $key + 1 }}</button>
                </li>
            </form>
        @endforeach
    </ul>

</x-layout>