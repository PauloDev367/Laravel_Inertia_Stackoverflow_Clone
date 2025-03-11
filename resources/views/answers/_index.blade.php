@if ($answerCount > 0)
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
                        @include('answers._answer')
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
