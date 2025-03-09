@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h1>
                                Editing answer for question: <strong>{{ $question->title }}</strong>
                            </h1>
                        </div>
                        <hr>
                        <form action="{{ route('questions.answers.update', [$question->id, $answer->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body"
                                    rows="7">
                                {{ old('body', $answer->body) }}
                            </textarea>
                                @if ($errors->has('body'))
                                    <div class="invalid-feedback">
                                        <strong>
                                            {{ $errors->first('body') }}
                                        </strong>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-outline-primary">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
