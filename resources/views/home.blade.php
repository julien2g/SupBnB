@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">

                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>


                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
    @endif


    <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">SupBnB
            <small>Your sweet home anywere</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Home</a>
            </li>
        </ol>

        <!-- Image Header -->
        <img class="img-fluid rounded mb-4"
             src="https://cdn7.bigcommerce.com/s-xypf89bnb0/images/stencil/original/e/paddleboard-open__13398.original.jpg"
             alt="SupBnB header">




        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-md-8">
            @foreach($homes as $home )
                <!-- Blog Post -->
                    <div class="card mb-4">
                        <img src="/storage/log.png" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{$home->title}}</h2>
                            <h2 class="card-title">{{$home->type}}</h2>
                            <p class="card-text">Located : {{$home->country}} at {{$home->city}} </p>
                            <a href="{{route('detailsHome', ['slug' => $home->slug])}}" class="btn btn-primary">More
                                details &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {!! $home->created_at !!}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card mb-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                        </div>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Sort by Country</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{route('sort', ['type' => 'country', 'data' => 'Belgium'] )}}">Belgium</a>
                                    </li>
                                    <li>
                                        <a href="{{route('sort', ['type' => 'country', 'data' => 'China'] )}}">China</a>
                                    </li>
                                    <li>
                                        <a href="{{route('sort', ['type' => 'country', 'data' => 'France'] )}}">France</a>
                                    </li>
                                    <li>
                                        <a href="{{route('sort', ['type' => 'country', 'data' => 'Guadeloupe'] )}}">Guadeloupe</a>
                                    </li>
                                    <li>
                                        <a href="{{route('sort', ['type' => 'country', 'data' => 'Italia'] )}}">Italia</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{route('sort', ['type' => 'country', 'data' => 'Iles Maurice'] )}}">Iles
                                            Maurice</a>
                                    </li>
                                    <li>
                                        <a href="{{route('sort', ['type' => 'country', 'data' => 'Iles de la reunion'] )}}">Iles
                                            de la reunion</a>
                                    </li>
                                    <li>
                                        <a href="{{route('sort', ['type' => 'country', 'data' => 'Maroc'] )}}">Maroc</a>
                                    </li>
                                    <li>
                                        <a href="{{route('sort', ['type' => 'country', 'data' => 'Martinique'] )}}">Martinique</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Our Exellence Project</h5>
                    <div class="card-body">
                        Here we are, thanks Supinfo for let us make this nice Exellence project. Thanks to us you can
                        find a stay with one of our classmate
                    </div>
                </div>

            </div>
            <!-- /.row -->

        </div>
    </div>
@endsection
