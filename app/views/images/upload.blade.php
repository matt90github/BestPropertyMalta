<!-- Official Website Property Images Upload Page -->

@section('title', 'Best Property Malta | Upload Images')

@include('common.property_errors')

<h3 class="form-signup-heading">Upload Images</h3>
<br/>
     {{ Form::open(array('url' => 'cms/images/upload', 'method' => 'post', 'id' => 'upload-image', 'enctype' => 'multipart/form-data', 'files' => true)) }}

        <div class="form-group">
            {{ Form::label('property_name', 'Property', array('class'=>'col-sm-1 control-label')) }} 

            <div class="col-sm-3">
                {{ Form::select('property_name', $propertyName, Input::old('property_name'), array('class'=>'form-control', 'placeholder'=>'Property Name')) }}
            </div>

            <div id="browse" class="btn btn-primary"><span class="glyphicon glyphicon-picture"></span>  Select images</div>

        </div>

        {{ Form::file('file[]', array('multiple' => 'multiple', 'id' => 'multiple-files', 'accept' => 'image/*')) }}

        <div id="files"></div>

        <div class="form-group" id="form-buttons">
            <a id="upload" href="#" class="btn btn-success" onclick="$(this).closest('form').submit();return false;">Upload Images</a>
            <a id="reset-images" href="#" class="btn btn-warning">Reset</a>
        </div>

    {{ Form::close() }}

    <div id="notifications">

        @if (Session::has('image-message'))
            <div class="alert {{ Session::get('status') }} alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('image-message') }}
            </div>
        @endif

    </div>

<script type="text/javascript">
    
        $('#form-buttons').hide();
        $('#multiple-files').hide();

        $("#browse").click(function () {
            $("#multiple-files").click();
        });

        $('#multiple-files').on('change', function() {
            $('#form-buttons').show();
            $('#notifications').hide();
            $('#files').html('');
            for (var i = 0; i < this.files.length; i++) {
                $('#files').append('<div class="alert alert-info">Selected Image: <b>' + this.files[i].name + '</b></div>');
            }
        });

        $('#reset-images').on('click', function() {
            $('#files').html('');
            $('#form-buttons').hide();
        });
</script>