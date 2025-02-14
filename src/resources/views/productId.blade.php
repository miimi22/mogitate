@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/productId.css')}}">
@endsection

@section('content')
<div class="product-detail">
    <div class="product-detail__header">
        <span class="product-detail__title">商品一覧</span>
        <span class="product-detail__separator">&gt;</span>
        <span class="product-detail__page-title">{{ $products->name }}</span>
    </div>
    <form action="/productId/{{ $product->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="product-detail__content">
            <div class="product-detail__image-area">
                <img src="{{ asset('storage/images/' . $product->image) }}" alt="画像" class="product-detail__image">
                <div class="product-detail__image-upload">
                    <label for="image-upload" class="product-detail__image-upload-label">ファイルを選択</label>
                    <input type="file" id="image-upload" class="product-detail__image-upload-input">
                </div>
            </div>
            <div class="product-detail__error">
                @error('image')
                {{ $message }}
                @enderror
            </div>
            <div class="product-detail__info">
                <div class="product-detail__name">
                    <label for="name" class="product-detail__label">商品名</label>
                    <input type="text" id="name" name="name" class="product-detail__input" value="{{ $product->name }}" placeholder="商品名を入力">
                </div>
                <div class="product-detail__error">
                @error('name')
                {{ $message }}
                @enderror
                </div>
                <div class="product-detail__price">
                    <label for="price" class="product-detail__label">値段</label>
                    <input type="text" id="price" name="price" class="product-detail__input" value="{{ $product->price }}" placeholder="値段を入力">
                </div>
                <div class="product-detail__error">
                @error('price')
                {{ $message }}
                @enderror
                </div>
                <div class="product-detail__season">
                    <label class="product-detail__label">季節</label>
                    <div class="product-detail__season-options">
                        @foreach ($seasons as $season)
                            <label>
                                <input type="radio" name="season_id" value="{{ $season->id }}" @if ($product->season_id == $season->id) checked @endif>
                                {{ $season->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="product-detail__error">
                @error('season_id')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="product-detail__description">
            <label class="product-detail__label">商品説明</label><br>
            <textarea name="description" class="product-detail__description-text" placeholder="商品の説明を入力">{{ $product->description }}</textarea>
        </div>
        <div class="product-detail__error">
            @error('description')
            {{ $message }}
            @enderror
        </div>
        <div class="product-detail__buttons">
            <button class="product-detail__button product-detail__back-button" name="back" type="button" onclick="window.history.back()">戻る</button>
            <button class="product-detail__button product-detail__save-button" name="save" type="submit">変更を保存</button>
            <button class="product-detail__button product-detail__delete-button" name="delete" type="submit">
                <img src="/img/trash.png" alt="削除"/>
            </button>
        </div>
    </form>
</div>
@endsection