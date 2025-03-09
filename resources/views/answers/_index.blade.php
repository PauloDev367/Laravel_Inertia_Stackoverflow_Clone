<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>
                        {{ $answerCount . ' ' . Str::plural('Answer', $answerCount) }}
                    </h2>
                </div>
                <hr>

                <x-messages />
                @foreach ($answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a href="#" title="This answer is useful" class="vote-up">
                                <i class="fa-solid fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">123</span>
                            <a href="#" title="This answer is not useful" class="vote-down off">
                                <i class="fa-solid fa-caret-down fa-3x""></i>
                            </a>
                            <a href="#" title="Mark this answer as best answer" class="{{$answer->status}} mt-2">
                                <i class="fa-solid fa-check fa-2x"></i>
                                <span class="favorites-count">123</span>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $answer->body_html !!}

                            <div class="row">
                                <div class="col-4">
                                    <div class="ml-auto">
                                        @can('update', $answer)
                                            <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}"
                                                class="btn btn-sm btn-outline-info">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('delete', $answer)
                                            <form class="form-delete"
                                                action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger" type="submit"
                                                    onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                                <div class="col-4">
                                </div>

                                <div class="col-4">
                                    <span class="text-muted">
                                        Answered {{ $answer->created_date }}
                                    </span>
                                    <div class="media mt-2">
                                        <a href="{{ $answer->user->url }}" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}" alt="User avatar">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $answer->user->url }}">
                                                {{ $answer->user->name }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
