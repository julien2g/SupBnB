@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-9">
                        <h1 class="my-4">{{$home->title}}</h1>
                        <div class="list-group">
                            <a href="{{route('sort', ['type' => 'country', 'data' => $home->country] )}}"
                               class="list-group-item">{{$home->country}}</a>
                            <p class="list-group-item">{{$home->city}}</p>
                            <p class="list-group-item">Hosted by <strong>{{Auth::user()->name}}</strong></p>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:20px !important;">
                    <div class="col-lg-12">
                        {!! $calendar->calendar() !!}
                        {!! $calendar->script() !!}
                    </div>
                    <h5>Wanna book ?</h5>
                    <hr>
                    <form method="get" action="{{route('book/add')}}">
                        <label for="start">Start : </label>
                        <input type="date" id="start" name="start">
                        <hr>
                        <label for="end">End : </label>
                        <input type="date" id="end" name="end">
                        <hr>
                        <input type="hidden" name="slug_home" value="{{$home->slug}}">
                        <input type="hidden" name="id_owner" value="{{$home->owner}}">

                        <button class="btn btn-info col-12" type="submit">Book</button>
                    </form>
                </div>
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-lg-8">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('sort', ['type' => 'country', 'data' => $home->country] )}}">{{$home->country}}</a>
                    </li>
                    <li class="breadcrumb-item">
                        {{$home->title}}
                    </li>
                    @if($home->owner ==  Auth::user()->id)
                        <li class="breadcrumb-item">
                            <a href="{{route('updateHome', ['slug' => $home->slug])}}">Modify</a>
                        </li>
                    @endif
                </ol>
                <div class="card mt-4">
                    @if(isset($img))
                        <img class="card-img-top img-fluid" src="{{ asset($img->title) }}" alt="Pics profile">
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">Location : {{$home->address}}</h3>
                        <h4>Type : {{$home->type_bed}} in {{$home->type}}</h4>
                        <p class="card-text">{{$home->content}}</p>

                    </div>
                </div>
                <!-- /.card -->
            </div>
            <div class="card card-outline-secondary my-4 col-12">
                <div class="card-header">
                    Home pictures
                </div>
                <div class="card-body">
                    @if($imgs)
                        @foreach($imgs as $img2 )
                            @if($home->slug == $img2->slug_home)
                                <img class="img-fluid rounded mb-3 mb-md-0" src="{{ asset($img2->title) }}" alt="">
                            @endif
                        @endforeach
                    @endif
                    <hr>
                    @if($home->owner ==  Auth::user()->id)
                        <form method="post" action="{{route('upload')}}" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <input type="file" name="image" class="form-control">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="slug" value="{{$home->slug}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image
                                    </button>
                                </div>
                            </div>

                        </form>
                    @endif
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col-lg-9 -->

        </div>

    </div>
    <!-- /.container -->


@endsection
