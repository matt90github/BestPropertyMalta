<!-- Official Website Property Images Index Page -->

@section('title', 'Best Property Malta | Property Images')

<h3 class="form-signup-heading">Property Images</h3>
<br/>
   <div class="form-group">
         {{ Form::label('property_id', 'Property', array('class'=>'col-sm-1 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::select('property_id', $propertyName, Input::old('property_id'), array('class'=>'form-control', 'placeholder'=>'Property')) }}
         </div>
    </div>

<br/><br/><br/>

    <div class="row" id="pics">
        @if($images->count())
            @foreach($images as $image)
                
                <?php $imageUrl = '../../public/uploads/'.$image->image_propertyId.'/'.$image->image_name; ?>

                @if($isMain=='0')
                    <?php $imageUrl = '../../../public/uploads/'.$image->image_propertyId.'/'.$image->image_name; ?>
                @endif

                <div class="col-sm-2">

                    <a href="<?php echo $imageUrl; ?>" data-lightbox="image-list">
                        {{ HTML::image('uploads/' . $image->image_propertyId . '/' . $image->image_name, $image->image_name, array('class' => 'img-responsive-index img-thumbnail', 'style' => 'display: block; margin: 0 auto;')) }}
                    </a>

                    @if($isMain == '0')
                        @if ($image->image_isPrimary != '1')
                            {{ Form::open(array('url' => 'cms/images/setasprimary/'.$image->image_propertyId.'/'.$image->image_id, 'method' => 'put')) }}
                            <a href="#" class="primary-button btn btn-success btn-sm btn-block" style="margin: 10px 0;" onclick="$(this).closest('form').submit();return false;">Set as Primary</a>
                            {{ Form::close() }}
                        @else
                            {{ Form::open(array('url' => 'cms/images/setasprimary/'.$image->image_propertyId.'/'.$image->image_id, 'method' => 'put')) }}
                            <a href="#" class="primary-button-true btn btn-success btn-sm btn-block" style="margin: 10px 0;">Set as Primary</a>
                            {{ Form::close() }}
                        @endif
                    @endif
                    
                    {{ Form::open(array('url' => 'cms/images/delete/' . $image->image_id, 'method' => 'delete')) }}
                    <a href="#" class="delete-button btn btn-danger btn-sm btn-block" style="margin: 10px 0;" onclick="$(this).closest('form').submit();return false;">Delete</a>
                    {{ Form::close() }}
                </div>

            @endforeach
        @else
            <div class="alert alert-danger">No Property Images Found</div>
        @endif

        <br class="clear"/>
    </div>
    <div class="pull-right">
        <ul class="pagination">
           {{ $images->appends(array_except(Input::query(), 'page'))->links() }}
       </ul>
    </div>

    <script type="text/javascript">
        $(function(){
           $('#property_id').change(function(e) {
                var propertyId=$(this);
                
                var pathArray = window.location.pathname.split( '/' );

                var newPathname = "";
                for ( i = 0; i < 5; i++ ) {
                    newPathname += pathArray[i] + "/";
                }

                var pathname = newPathname + propertyId.val();
                window.location = pathname;
           });
        });

        $('#myTab a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        });

          $(".primary-button").click(function () { 
                $(this).fadeTo("fast", .5).removeAttr("href");
                $(this).addClass("disabled_anchor"); 
          });

          $(".delete-button").click(function () { 
             $(this).fadeTo("fast", .5).removeAttr("href");
             $(this).addClass("disabled_anchor"); 
          });

        $('.primary-button-true').addClass('disabled');


        $('.pager').hide();
        $('#pics').infinitescroll({
            navSelector     : ".pager",
            nextSelector    : ".pager a:last",
            itemSelector    : ".col-sm-2",
            debug           : false,
            dataType        : 'html',
            path: function(index) {
                return "?page=" + index;
            },
            loading: {
                finishedMsg: ""
            }
        }, function(newElements, data, url){

            var $newElems = $( newElements );
            $('#pics').masonry( 'appended', $newElems, true);

        });

    </script>