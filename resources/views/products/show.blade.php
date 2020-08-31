@extends('layouts.master')

@section('content')

     <div class="col-md-12">
        <div class="row no-gutters p-3 border rounded d-flex align-items-center flex-md-row mb-4 shadow-sm position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <muted class="d-inline-block mb-2 text-info">
              @foreach ($product->categories as $category)
                  {{ $category->name }}{{ $loop->last ? '' : ', '}}
              @endforeach
            </muted>
          <h5 class="mb-0">{{ $product->title }}</h5>
          <div class="mb-1 text-muted">{{ $product->created_at->format('d/m/Y') }}</div>
          <p class="mb-auto">{!! $product->description !!}</p>
          <strong class="mb-auto">{{ $product->getPrice() }}</strong>
          <form action="{{ route('cart.store') }}" method="POST">
            @csrf 
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn btn-dark"><i class="fa fa-shopping-basket mr-2" aria-hidden="true"></i>Ajouter au panier</button>
          </form>
        </div>
        <div class="col-auto d-none d-lg-block">
           <img src="{{ asset('storage/' . $product->image) }}" class="w-25" style="margin-right:10px ;" alt="">
         </div>
       </div>
     </div>

@endsection