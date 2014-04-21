<!-- CMS Banner Images Index Page -->

@section('title', 'Best Property Malta | Banner Images')

<h3 class="form-signup-heading">Banner Images</h3>
<br/>
    <div class="row" id="pics">
        @if($bannerImages->count())
            @foreach($bannerImages as $bannerImage)
                
                <?php $bannerImageUrl = '../../public/uploads/bannerImages/'.$bannerImage->banner_image_name; ?>

                <div class="col-sm-6">

                    <a href="<?php echo $bannerImageUrl; ?>" data-lightbox="image-list">
                        {{ HTML::image('uploads/bannerImages/'.$bannerImage->banner_image_name, $bannerImage->banner_image_name, array('class' => 'img-responsive-index img-thumbnail', 'style' => 'display: block; margin: 0 auto;')) }}
                    </a>
                    
                    {{ Form::open(array('url' => 'cms/banner_images/delete/' . $bannerImage->banner_image_id, 'method' => 'delete')) }}
                    <a href="#" class="delete-button btn btn-danger btn-sm btn-block" style="margin: 10px 0;" onclick="$(this).closest('form').submit();return false;">Delete</a>
                    {{ Form::close() }}
                </div>

            @endforeach
        @else
            <div class="banner-alert alert-danger">No Banner Images Found</div>
        @endif

        <br class="clear"/>
    </div>
    <div class="pull-right">
        <ul class="pagination">
           {{ $bannerImages->appends(array_except(Input::query(), 'page'))->links() }}
       </ul>
    </div>

    <script type="text/javascript">
        $(function(){
           
          $(".delete-button").click(function () { 
             $(this).fadeTo("fast", .5).removeAttr("href");
             $(this).addClass("disabled_anchor"); 
          });

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