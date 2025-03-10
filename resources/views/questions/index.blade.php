@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>All questions</h2>
                            <div class="ml-auto">
                                <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">
                                    Ask Question
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <x-messages />
                        @foreach ($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counters">
                                    <div class="vote">
                                        <strong>
                                            {{ $question->votes }}
                                        </strong>
                                        {{ Str::plural('vote', $question->votes) }}
                                    </div>
                                    <div class="status {{ $question->status }}">
                                        <strong>
                                            {{ $question->answers_count }}
                                        </strong>
                                        {{ Str::plural('answer', $question->answers_count) }}
                                    </div>
                                    <div class="view">
                                        {{ $question->views . ' ' . Str::plural('view', $question->views) }}
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <h3 class="mt-0">
                                            <a href="{{ $question->url }}">
                                                {{ $question->title }}
                                            </a>
                                        </h3>
                                        <div class="ml-auto">
                                            @can('update', $question)
                                                <a href="{{ route('questions.edit', $question->id) }}"
                                                    class="btn btn-sm btn-outline-info">
                                                    Edit
                                                </a>
                                            @endcan

                                            @can('delete', $question)
                                                <form class="form-delete"
                                                    action="{{ route('questions.destroy', $question->id) }}" method="POST">
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
                                    <p class="lead">
                                        Asked by
                                        <a href="{{ $question->user->url }}">
                                            {{ $question->user->name }}
                                            <small class="text-muted">
                                                {{ $question->created_date }}
                                            </small>
                                        </a>
                                    </p>
                                    {{ Str::limit($question->body, 250, '...') }}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <div class="mt-5">
                            {{ $questions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
