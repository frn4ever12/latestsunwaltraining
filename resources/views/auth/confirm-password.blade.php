@extends('frontend.includes.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="mb-3 text-muted small">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Confirm') }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
