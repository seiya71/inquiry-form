@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

<form class="form" action="/logout" method="post">
    @csrf
    <button class="header-nav__button">logout</button>
</form>
<div class="admin__content">
    <div class="admin__heading">
        Admin
    </div>
</div>

<form class="admin__search" action="/search-results" method="GET">
    <div class="admin__search-text">
        <input type="text" name="query" value="{{ request('search_term') }}" placeholder="名前やメールアドレスを入力してください " />
    </div>
    <div>
        <select class="admin__search-gender" name="gender">
            <option value="" disabled selected>性別</option>
            <option value="全て" {{ request('gender') == '全て' ? 'selected' : '' }}>男性</option>
            <option value="男性" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
            <option value="女性" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
            <option value="その他" {{ request('gender') == 'その他' ? 'selected' : '' }}>その他</option>
        </select>
    </div>
    <div>
        <select class="admin__search-category" name="categories">
            <option value="" disabled selected>お問い合わせの種類</option>
            <option value="質問" {{ request('categories') == '質問' ? 'selected' : '' }}>質問</option>
        </select>
    </div>
    <div class="admin__search-date">
        <input type="date" name="search_date" value="{{ request('search_date') }}" placeholder="年/月/日">
    </div>
    <div class="admin__search-button">
        <button type="submit">検索</button>
    </div>
    <div class="admin__search-reset">
        <button type="reset">リセット</button>
    </div>
</form>

<form action="/export" method="GET">
    <div>
        <button type="submit">エクスポート</button>
    </div>
</form>

<div class="pagination">
    {{ $results->appends(request()->input())->links() }}
</div>

<table class="admin__table">
    <tr class="admin__table-label">
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
    </tr>
    @foreach ($results as $result)
        <tr>
            <td>{{ $result->name }}</td>
            <td>{{ $result->gender }}</td>
            <td>{{ $result->email }}</td>
            <td>{{ $result->inquiry_type }}</td>
            <td>
                <input type="checkbox" id="modal-toggle-{{ $result->id }}" class="modal-toggle">
                <label for="modal-toggle-{{ $result->id }}" class="details-button">詳細表示</label>
            </td>
        </tr>
    @endforeach
</table>

@foreach ($results as $result)
    <div id="modal-{{ $result->id }}" class="modal">
        <div class="modal-content">
            <label for="modal-toggle-{{ $result->id }}" class="close">&times;</label>
            <h2>詳細情報</h2>
            <div class="modal-body">
                <p><strong>お名前:</strong> {{ $result->name }}</p>
                <p><strong>性別:</strong> {{ $result->gender }}</p>
                <p><strong>メールアドレス:</strong> {{ $result->email }}</p>
                <p><strong>お問い合わせの種類:</strong> {{ $result->inquiry_type }}</p>
            </div>
            <form action="/delete/{{ $result->id }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">削除</button>
            </form>
        </div>
    </div>
@endforeach
@endsection