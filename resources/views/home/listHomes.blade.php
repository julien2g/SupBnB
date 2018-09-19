@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Home</a>
            </li>
            <li class="breadcrumb-item">
                {!! $data !!}
            </li>
        </ol>
    @if(isset($homes)) <!--FIX IF !!!!!!!!! -->
        @foreach($homes as $home )
            <div class="row">
                <div class="col-md-7">
                    <a href="#">
                      @foreach($imgs as $img )
                      @if($home->slug == $img->slug_home)
                       <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset($img->title) }}" alt="">
                        @endif
                    @endforeach
                    </a>
                </div>
                <div class="col-md-5">
                    <h3 class="card-title">{{$home->title}}</h3>
                    <h5 class="card-title">{{$home->type_bed}} in {{$home->type}}</h5>
                    <a href="{{route('detailsHome', ['slug' => $home->slug])}}" class="btn btn-primary">More details &rarr;</a>
                </div>
            </div>
            <hr>
        @endforeach
        @else
            <h1 class="center-block">Sorry we are unable to find any house in this area.</h1>
        @endif
    </div>
@endsection
