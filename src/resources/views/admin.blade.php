@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css')}}">
@endsection

@section('link')

<form class="form" action="/logout" method="post">
    @csrf
    <button class="header-nav__button">ログアウト</button>
</form>
@endsection

@section('content')
<div class="admin">
    <h2 class="admin__heading">Admin</h2>

    <div class="admin__inner">
        <form action="/search" class="search-form" method="get">
            @csrf
            <input class="search-form__keyword-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{request('keyword')}}">
            <div class="search-form__gender">
                <select class="search-form__gender-select" name="gender">
                    <option disabled {{ !request('gender') ? 'selected' : '' }}>性別</option>
                    <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                    <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                    <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
                </select>
            </div>
            <div class="search-form__category">
                <select class="search-form__category-select" name="category_id">
                    <option disabled selected>お問い合わせの種類</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>{{
              $category->content }}</option>
                    @endforeach
                </select>
            </div>
            <input class="search-form__date" type="date" name="date" value="{{request('date')}}">
            <div class="search-form__actions">
                <input class="search-form__search-btn" type="submit" value="検索">
                <input class="search-form__reset-btn" type="submit" value="リセット" name="reset">
            </div>
        </form>
        <div class="pagination">
            {{ $contacts->links('pagination::bootstrap-4') }}
        </div>
        <table class="admin__table">
            <tr class="admin__tr">
                <th class="admin__label">お名前</th>
                <th class="admin__label">性別</th>
                <th class="admin__label">メールアドレス</th>
                <th class="admin__label">お問い合わせの種類</th>
                <th class="admin__label"></th>
            </tr>
            @foreach($contacts as $contact)
            <tr class="admin__td">
                <td class="admin__data">{{$contact->first_name}}{{$contact->last_name}}</td>
                <td class="admin__data">
                    @if($contact->gender == 1)
                    男性
                    @elseif($contact->gender == 2)
                    女性
                    @else
                    その他
                    @endif
                </td>
                <td class="admin__data">{{$contact->email}}</td>
                <td class="admin__data">{{$contact->category->content}}</td>
                <td class="admin__data">
                    <a href="#{{$contact->id}}" class="modal-open-button">詳細</a>

                </td>
            </tr>

            <div class="modal" id="{{$contact->id}}">
                <div class="modal-wrapper">
                    <a href="#" class="close">&times;</a>
                    <div class="modal-content" id="">

                        <form class="modal__delete-form" action="/delete" method="post">
                            @csrf
                            <div class="modal-form__group">
                                <ladel class="modal-form__ladel">お名前</ladel>
                                <p>{{$contact->first_name}}　{{$contact->last_name}}</p>
                            </div>
                            <div class="modal-form__group">
                                <ladel class="modal-form__ladel">性別</ladel>
                                <p> @if($contact->gender == 1)
                                    男性
                                    @elseif($contact->gender == 2)
                                    女性
                                    @else
                                    その他
                                    @endif</p>
                            </div>
                            <div class="modal-form__group">
                                <ladel class="modal-form__ladel">メールアドレス</ladel>
                                <p>{{$contact->email}}</p>
                            </div>
                            <div class="modal-form__group">
                                <ladel class="modal-form__ladel">電話番号</ladel>
                                <p>{{$contact->tell}}</p>
                            </div>
                            <div class="modal-form__group">
                                <ladel class="modal-form__ladel">住所</ladel>
                                <p>{{$contact->address}}</p>
                            </div>
                            <div class="modal-form__group">
                                <ladel class="modal-form__ladel">建物名</ladel>
                                <p>{{$contact->building}}</p>
                            </div>
                            <div class="modal-form__group">
                                <ladel class="modal-form__ladel">お問い合わせの種類</ladel>
                                <p>{{$contact->category->content}}</p>
                            </div>
                            <div class="modal-form__group">
                                <ladel class="modal-form__ladel">お問い合わせ内容</ladel>
                                <p>{{$contact->detail}}</p>
                            </div>
                            <div class="modal-form__delete">
                                <input type="hidden" name="id" value="{{ $contact->id }}">
                                <button class="modal-form__delete-btn" type="submit">削除</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>


            @endforeach
        </table>
    </div>
</div>
@endsection