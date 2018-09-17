@extends('layouts.app')



@section('content')
    <div class="container">
        <form method="post"
              action="{{ isset($home->slug) ? route('updateHome', ['slug' => $home->slug ]) : route('createHome')}} ">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$home->title or ''}}" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="{{$home->type or ''}}">{{$home->type or 'Please select'}}</option>
                    <option value="Home">Home</option>
                    <option value="Appartment">Appartment</option>
                    <option value="Tree house">Tree house</option>
                </select>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select name="country" id="country" class="form-control" required>
                    <option value="{{$home->country or ''}}">{{$home->country or 'Please select'}}</option>
                    <option value="Belgium">Belgium</option>
                    <option value="China">China</option>
                    <option value="France">France</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Italia">Italie</option>
                    <option value="Iles Maurice">Iles Maurice</option>
                    <option value="Iles de la reunion">Iles de la reunion</option>
                    <option value="Belgium">Maroc</option>
                    <option value="Martinique">Martinique</option>
                </select>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="form-control" value="{{$home->city or ''}}" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{$home->address or ''}}"
                       required>
            </div>
            <div class="form-group">
                <label for="type_bed">Type bed</label>
                <select name="type_bed" id="type_bed" class="form-control" required>
                    <option value="{{$home->type_bed or ''}}">{{$home->type_bed or 'Please select'}}</option>
                    <option value="Bed">Bed</option>
                    <option value="Sofa">Sofa</option>
                    <option value="Inflatable mattress ">Inflatable mattress</option>
                    <option value="Carpet">Carpet</option>
                </select>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" required>
{{$home->content or ''}}
      </textarea>
            </div>
            <input type="hidden" name="slug" value="{{ $home->slug or '' }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <button class="btn btn-info" type="submit">{{isset($home->slug) ? 'Update' : 'Add'}}</button>
            </div>
        </form>
        @if(isset($home->slug))
            <form method="post" action="{{route('upload')}}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <input type="file" name="image" class="form-control">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="slug" value="{{$home->slug}}">
                        <input type="hidden" name="slug" value="{{$home->slug}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
                    </div>
                </div>

            </form>
        @endif
    </div>
@endsection