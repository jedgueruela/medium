@extends('layouts.app')

@section('content')
    <h1 class="mb-8 text-center">Login</h1>
    <div class="flex justify-center">
        <div class="w-1/2">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">E-Mail Address</label>
                    <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }} appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="block mb-4 bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-group">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }} appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" name="password" required>
                    @if ($errors->has('password'))
                        <span class="block mb-4 bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-group">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">{{ __('Remember Me') }}</label>
                </div>

                <button type="submit" class="no-underline uppercase bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4">Login</button>
            </form>
        </div>
    </div>
@endsection
