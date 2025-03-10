@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <h2>{{ $question->title }}</h2>
                                <div class="ml-auto">
                                    <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">
                                        Back to all questions
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                <a href="#" title="This question is useful" class="vote-up">
                                    <i class="fa-solid fa-caret-up fa-3x"></i>
                                </a>
                                <span class="votes-count">123</span>
                                <a href="#" title="This question is not useful" class="vote-down off">
                                    <i class="fa-solid fa-caret-down fa-3x"></i>
                                </a>

                                <a href="#" title="Click to mark as favorite question (Click again to undo)"
                                    class="favorite mt-2 {{ Auth::guest() ? 'off' : ($question->is_favorited ? 'favorited' : '') }}"
                                    onclick="event.preventDefault();document.getElementById('favorite-question-{{ $question->id }}').submit();">
                                    <i class="fa-solid fa-star fa-2x"></i>
                                    <span class="favorites-count">
                                        {{ $question->favorites_count }}
                                    </span>
                                </a>

                                <form id="favorite-question-{{ $question->id }}"
                                    action="/questions/{{ $question->id }}/favorites" method="POST" class="d-none">
                                    @csrf
                                    @if ($question->is_favorited)
                                        @method('DELETE')
                                    @endif
                                </form>
                            </div>
                            <div class="media-body">
                                {!! $question->body_html !!}
                                <div class="float-right">
                                    <span class="text-muted">
                                        Answered {{ $question->created_date }}
                                    </span>
                                    <div class="media mt-2">
                                        <a href="{{ $question->user->url }}" class="pr-2">
                                            <img src="{{ $question->user->avatar }}" alt="User avatar">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $question->user->url }}">
                                                {{ $question->user->name }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('answers._index', [
            'answerCount' => $question->answers_count,
            'answers' => $question->answers,
        ])
        @if (Auth::user())
            @include('answers._create')
        @endif
    </div>
@endsection
