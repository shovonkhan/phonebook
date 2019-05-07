<!DOCTYPE html>
<html>
 <head>
  <title>Inventory</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
 </head>
 <body>
  <br />
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <h1>{{isset($image)?'Edit':'New'}} Image</h1>
            <hr/>
            @if(isset($image))
                {!! Form::model($image,['method'=>'put','files'=>true]) !!}
            @else
                {!! Form::open(['files'=>true]) !!}
            @endif
            <div class="form-group row">
                {!! Form::label("image","Image",["class"=>"col-form-label col-md-3"]) !!}
                <div class="col-md-5">
                    <img id="preview"
                         src="{{asset((isset($image) && $image->image!='')?'uploads/'.$image->image:'images/noimage.jpg')}}"
                         height="200px" width="200px"/>
                    {!! Form::file("image",["class"=>"form-control","style"=>"display:none"]) !!}
                    <br/>
                    <a href="javascript:changeProfile();">Change</a> |
                    <a style="color: red" href="javascript:removeImage()">Remove</a>
                    <input type="hidden" style="display: none" value="0" name="remove" id="remove">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3 col-lg-2"></div>
                <div class="col-md-4">
                    <a href="{{url('laravel-crud-image-gallery')}}" class="btn btn-danger">
                        Back</a>
                    {!! Form::button("Save",["type" => "submit","class"=>"btn
                btn-primary"])!!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')
    <script>
        function changeProfile() {
            $('#image').click();
        }
        $('#image').change(function () {
            var imgPath = $(this)[0].value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                readURL(this);
            else
                alert("Please select image file (jpg, jpeg, png).")
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                    $('#remove').val(0);
                }
            }
        }
        function removeImage() {
            $('#preview').attr('src', '{{url('images/noimage.jpg')}}');
            $('#remove').val(1);
        }
    </script>

 </body>
</html>