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
                <h1>Peoples booked your listing</h1>
                @foreach($reservations as $key => $reservation)

                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title float-right">| {{$owners_r[$key]->name}}'s phone : {{$owners_r[$key]->phone}} </h2>
                            <h2 class="card-title">{{$owners_r[$key]->name}} want to book {{$homes_r[$key]->title}}</h2>
                            <h4 class="card-title">{{$homes_r[$key]->address}}</h4>

                            <p class="card-text">Start : {{$reservation->start}}</p>
                            <p class="card-text">End : {{$reservation->end}}</p>

                            <h4>
                            <a href="{{route('booking/accepted', $reservation->id)}}" type="button" class="btn btn-success">Accept</a>
                            <a href="{{route('booking/refused', $reservation->id)}}" type="button" class="btn btn-danger">Decline</a>
                                <a href="{{route('detailsHome', ['slug' => $reservation->slug_home])}}"
                                   class="btn btn-primary">Descriptions &rarr;</a>
                            </h4>
                            <hr>
                            @if($reservation->accepted == 0)
                                <div class="alert alert-warning" role="alert">
                                   Your guests wait and they are patient, tell them if you wanna welcome them.
                                </div>
                            @endif
                            @if($reservation->accepted == 1)
                                <div class="alert alert-success" role="alert">
                                    This is a success, you are an host !
                                    Welcome to you guest. Feel free to contact your guest.
                                </div>
                            @endif

                            @if($reservation->accepted == 2)
                                <div class="alert alert-danger" role="alert">
                                    You don't want this reservation.
                                </div>
                            @endif
                        </div>
                        <div class="card-footer text-muted">
                            Booked on {!! $reservation->created_at !!}
                        </div>
                    </div>

                @endforeach
                <hr>
                    <h1>You booked the people listing</h1>
                @foreach($bookings as $key => $booking )


                <!-- Blog Post -->
                    <div class="card mb-4">
                        {{-- @if($booking->accepted == 1)--}}
                        <img class="card-img-top"
                             src="https://cdn7.bigcommerce.com/s-xypf89bnb0/images/stencil/original/e/paddleboard-open__13398.original.jpg"
                             alt="Card image cap">
                        {{--  @else
                               <img class="card-img-top"
                                    src="http://www.cherrieimogenmakeup.co.uk/wp-content/uploads/2016/06/sorry.jpg"
                                    alt="Card image cap">
                           @endif--}}
                        <div class="card-body">
                            <h2 class="card-title float-right">{{$owners[$key]->name}}
                                @if($reservation->accepted == 1)
                                    : {{$owners[$key]->phone}}
                                @endif
                            </h2>
                            <h2 class="card-title">{{$homes[$key]->title}}</h2>
                            <h2 class="card-title">{{$homes[$key]->country}}</h2>
                            <h3 class="card-title">{{$homes[$key]->city}}</h3>
                            <h4 class="card-title">{{$homes[$key]->address}}</h4>
                            <p class="card-text">Start : {{$booking->start}}</p>
                            <p class="card-text">End : {{$booking->end}}</p>

                            <h4><a href="{{route('detailsHome', ['slug' => $booking->slug_home])}}"
                                   class="btn btn-primary">Descriptions &rarr;</a></h4>
                            <hr>
                            @if($booking->accepted == 0)
                                <div class="alert alert-warning" role="alert">
                                    Wait and be patient, your host still not accepted the reservaton.
                                </div>
                            @endif
                            @if($booking->accepted == 1)
                                <div class="alert alert-success" role="alert">
                                    This is a success, your host accepted the reservaton.
                                    You have now access to {{$owners[$key]->name}}'s phone number. let's chat 👀
                                </div>
                            @endif

                            @if($booking->accepted == 2)
                                <div class="alert alert-danger" role="alert">
                                    Your host not accepted the reservaton.
                                </div>
                            @endif


                        </div>
                        <div class="card-footer text-muted">
                            Booked on {!! $booking->created_at !!}
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
