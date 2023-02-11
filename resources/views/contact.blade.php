@extends("layouts.main")

@section("title", "Contact")

@section("scripts")
<x-validation-scripts></x-validation-scripts>
@endsection

@section("content")
    @if (isset($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>Contact</h1>
                <form method="POST" action="{{ route("contact") }}">
                    @csrf

                    <div class="form-group">
                        <label class="form-label required-input">E-mail:</label>
                        <input class="form-control" type="email" name="email" />
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">Onderwerp:</label>
                        <input class="form-control" type="text" name="subject" />
                    </div>
                    <div class="form-group">
                        <label class="form-label required-input">Bericht:</label>
                        <textarea class="form-control" name="body"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">
                        Versturen
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
