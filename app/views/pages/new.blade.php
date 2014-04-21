<!-- CMS New Page View -->

@section('title', 'Best Property Malta | New Page')
@include('common.page_errors')

{{ Form::open(array('url'=>'cms/pages/create', 'class'=>'form-horizontal', 'id'=>'page-details',  'role'=>'form')) }}
   
   <h3 class="form-signup-heading">New Page</h3>

   <div class="form-group">
         {{ Form::label('page_title', 'Title', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::text('page_title', Input::old('page_title'), array('class'=>'form-control', 'placeholder'=>'Title')) }} 
         </div>
   </div>

   <div class="form-group">
   		{{ Form::label('page_content', 'Content', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-10">
   			{{ Form::textarea('page_content', Input::old('page_content'), array('class'=>'form-control', 'placeholder'=>'Content')) }} 
   		
            <script type="text/javascript" src="<?= url('../public/ckeditor/ckeditor.js') ?>"></script>
            <script>CKEDITOR.replace('page_content');</script>

         </div>
   </div>

   <div class="form-group">
   		{{ Form::label('page_isPublished', 'Publish?', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-1">
   			{{ Form::checkbox('page_isPublished', Input::old('page_isPublished'), true, array('class'=>'form-control', 'placeholder'=>'Publish?')) }} 
   		</div>
   </div>
   
   <div class="form-custom-buttons">
         <a id="modify-page" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Add Page</a>
         {{link_to_route('pages', 'Cancel', null, array('class'=>'btn btn-default'))}}
   </div>
   <br/><br/>
{{ Form::close() }}

