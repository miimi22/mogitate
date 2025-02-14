@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css')}}">
@endsection

@section('content')
<div class="container">
    <h1>商品登録</h1>
    <form action="/register" method="post">
        @csrf
        <div class="form-group">
            <label for="name">商品名&nbsp;<span class="required">必須</span></label>
            <input type="text" id="name" name="name" placeholder="商品名を入力">
        </div>
        <div class="error-message">
            @error('name')
            {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="price">値段&nbsp;<span class="required">必須</span></label>
            <input type="number" id="price" name="price" placeholder="値段を入力">
        </div>
        <div class="error-message">
            @error('price')
            {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="image">商品画像&nbsp;<span class="required">必須</span></label>
            <input type="file" id="image" name="image">
        </div>
        <div class="error-message">
            @error('image')
            {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="season_id">季節&nbsp;<span class="required">必須</span>&nbsp;<span class="select">複数選択可</span></label>
            <div class="seasons">
                <label><input type="checkbox" id="season_id" name="season_id[]" value="春">春</label>
                <label><input type="checkbox" id="season_id" name="season_id[]" value="夏">夏</label>
                <label><input type="checkbox" id="season_id" name="season_id[]" value="秋">秋</label>
                <label><input type="checkbox" id="season_id" name="season_id[]" value="冬">冬</label>
            </div>
        </div>
        <div class="error-message">
            @error('season_id')
            {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="description">商品説明&nbsp;<span class="required">必須</span></label>
            <textarea id="description" name="description" placeholder="商品の説明を入力"></textarea>
        </div>
        <div class="error-message">
            @error('description')
            {{ $message }}
            @enderror
        </div>
        <div class="buttons">
            <button type="button" class="back-button">戻る</button>
            <button type="submit" class="register-button">登録</button>
        </div>
    </form>
</div>
@endsection