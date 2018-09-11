@if($image)
    <div class="row">
        <div class="col-md-8">
            <strong>Original Image:</strong>
            <br/>
            <img src="/images/{{$image->filename}}" />
        </div>
        <div class="col-md-4">
            <strong>Thumbnail Image:</strong>
            <br/>
            <img src="/thumbnail/{{$image->filename}}"  />
        </div>
    </div>
@endif