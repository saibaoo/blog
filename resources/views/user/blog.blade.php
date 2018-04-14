@extends('user/app')
@section('bg-img',asset('/user/img/home-bg.jpg'))
@section('title','Corvinus post')
@section('sub-heading','We Get What We Did')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .fa-thumbs-o-up:hover{
      color:red;
    }
  </style>
@endsection
@section('main-content')

<div class="container">
  <div class="row" id="app">
    <div class="col-lg-8 col-md-10 mx-auto">

        <posts v-for='value in blog' 
        :title='value.title'
        :subtitle='value.subtitle'
        :created_at='value.created_at'
        :created_at='value.created_at'
        :key='value.index'
        :post_id='value.id'
        login='{{Auth::check()}}'
        :likes='value.likes.length'
        :slug='value.slug'
        > 
        </posts>
      <hr>

      <!-- Pager -->

      {{$posts->links()}}

    </div>
  </div>
</div>

<hr>

@endsection

@section('footer')
  <script src="{{asset('js/app.js')}}"></script>
@endsection