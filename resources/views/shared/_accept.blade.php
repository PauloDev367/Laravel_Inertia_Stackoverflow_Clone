@can('accept', $model)
    <a href="#" title="Mark this answer as best answer" class="{{ $model->status }} mt-2"
        onclick="event.preventDefault();document.getElementById('accept-answer-{{ $model->id }}').submit();">
        <i class="fa-solid fa-check fa-2x"></i>
    </a>
    <form id="accept-answer-{{ $model->id }}" action="{{ route('answers.accept', $model->id) }}" method="POST"
        class="d-none">
        @csrf
    </form>
@else
    @if ($model->is_best)
        <a href="#" title="The question owner accepted this answer as best answer" class="{{ $model->status }} mt-2">
            <i class="fa-solid fa-check fa-2x"></i>
        </a>
    @endif
@endcan
