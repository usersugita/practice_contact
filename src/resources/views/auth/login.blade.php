@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css')}}">
@endsection

@section('link')
<a class="header__link" href="/register">register</a>
@endsection

@section('content')
<div class="register-form">
    <h2 class="register-form__logo">
        Login
    </h2>
    <div class="register-form__inner">
        <form action="/login" method="post" class="register-form__form">
            @csrf
            
            <div class="register-form__group">
                <label class="register-form__label" for="email">メールアドレス</label>
                <input class="register-form__input" type="email" name="email" id="email" placeholder="例：abc@def.ghij">
                <p class="register-form__error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-form__group">
                <label class="register-form__label" for="password">パスワード</label>
                <input class="register-form__input" type="password" name="password" id="password" placeholder="例：coachtech1111">
                <p class="register-form__error-message">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <input class="register-form__btn" type="submit" value="ログイン">
        </form>
    </div>
</div>
@endsection('content')