@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css')}}">
@endsection

@section('link')


@endsection

@section('content')
<div class="contact-form">
    <h2 class="contact-form__logo">Contact</h2>
    <div class="contact-form__inner">
        <form action="/confirm" method="post">
            @csrf
            <div class="contact-form__name">
                <label for="name">お名前<span>※</span></label>
                <div class="contact-form__name-input">
                    <input type="text" name="first_name" id="name" value="{{ old('first_name') }}" placeholder="例：山田">
                    <input type="text" name="last_name" id="" value="{{ old('last_name') }}" placeholder="例：太郎">
                </div>

            </div>
            <div class="contact-form__error-message">
                @if ($errors->has('first_name'))
                <p class="contact-form__error-message-first-name">{{$errors->first('first_name')}}</p>
                @endif
                @if ($errors->has('last_name'))
                <p class="contact-form__error-message-last-name">{{$errors->first('last_name')}}</p>
                @endif
            </div>
            <div class="contact-form__gender">
                <label for="gender">性別<span>※</span></label>
                <div class="contact-form__gender-input">
                    <input type="radio" name="gender" id="man" value="1" {{
                old('gender')==1 ? 'checked' : '' }}>
                    <label for="man">男性</label>
                    <input type="radio" name="gender" id="woman" value="2" {{
                old('gender')==2 ? 'checked' : '' }}>
                    <label for="woman">女性</label>
                    <input type="radio" name="gender" id="others" value="3" {{
                old('gender')==3 ? 'checked' : '' }}>
                    <label for="others">その他</label>
                </div>

            </div>
            <p class="contact-form__error-message">
                @error('gender')
                {{ $message }}
                @enderror
            </p>
            <div class="contact-form__email">
                <label for="email">メールアドレス<span>※</span></label>
                <div class="contact-form__email-input">
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        placeholder="例：test@example.com">
                </div>

            </div>
            <p class="contact-form__error-message">
                @error('email')
                {{ $message }}
                @enderror
            </p>
            <div class="contact-form__tell">
                <label for="tell">電話番号<span>※</span></label>
                <div class="contact-form__tell-input">
                    <input type="tel" name="tel_1" id="tell" value="{{ old('tel_1') }}">
                    <span>-</span>
                    <input type="tel" name="tel_2" id="tell" value="{{ old('tel_2') }}">
                    <span>-</span>
                    <input type="tel" name="tel_3" id="tell" value="{{ old('tel_3') }}">
                </div>

            </div>
            <p class="contact-form__error-message">
                @if ($errors->has('tel_1'))
                {{$errors->first('tel_1')}}
                @elseif ($errors->has('tel_2'))
                {{$errors->first('tel_2')}}
                @else
                {{$errors->first('tel_3')}}
                @endif
            </p>
            <div class="contact-form__address">
                <label for="address">住所<span>※</span></label>
                <div class="contact-form__address-input">
                    <input type="text" name="address" id="address" value="{{ old('address') }}"
                        placeholder="例：東京都渋谷区千駄ヶ谷1-2-3">
                </div>

            </div>
            <p class="contact-form__error-message">
                @error('address')
                {{ $message }}
                @enderror
            </p>
            <div class="contact-form__building">
                <label for="building">建物名<span></span></label>
                <div class="contact-form__building-input">
                    <input type="text" name="building" id="building" value="{{ old('building') }}"
                        placeholder="例：千駄ヶ谷マンション101">
                </div>

            </div>
            <div class="contact-form__category">
                <label for="category">お問い合わせの種類<span>※</span></label>
                <div class="contact-form__category_id-input">
                    <select class="contact-form__select" name="category_id" id="">
                        <option disabled selected>選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>{{
              $category->content }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <p class="contact-form__error-message">
                @error('category_id')
                {{ $message }}
                @enderror
            </p>
            <div class="contact-form__detail">
                <label for="detail">お問い合わせ内容<span>※</span></label>
                <div class="contact-form__detail-input">
                    <textarea class="contact-form__textarea" name="detail" id="" cols="30" rows="10"
                        placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </div>

            </div>
            <p class="contact-form__error-message">
                @error('detail')
                {{ $message }}
                @enderror
            </p>
            <input class="contact-form__btn" type="submit" value="確認画面">
        </form>
    </div>
</div>
@endsection