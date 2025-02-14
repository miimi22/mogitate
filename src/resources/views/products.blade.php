@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css')}}">
@endsection

@section('content')
<div class="product-list">
    <div class="product-list__title">
        <h1 class="product-list__title--logo">商品一覧</h1>
        <form class="product-addition" action="/products/create" method="get">
            @csrf
            <button class="product-addition__button" type="submit">＋商品を追加</button>
        </form>
    </div>
    <div class="product-list__content">
        <form action="/search" class="product-search" method="get">
            @csrf
            <div class="product-search__inner">
                <input type="text" name="keyword" class="product-search__text" placeholder="商品名で検索"><br>
                <button class="product-search__button" type="submit">検索</button>
            </div>
            <div class="product-grid">  
                @foreach ($products as $product)
                    <a href="/productId/{{ $product->id }}" class="product-item">
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">  
                        <div class="product-details"> 
                            <span class="product-name">{{$product->name}}</span>
                            <span class="product-price">¥{{$product->price}}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </form>
        <div class="paginate">
            {{ $products->links('pagination::default') }}
        </div>
    </div>
</div>
@endsection