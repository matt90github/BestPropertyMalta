<!-- CMS Page Details View -->

@section('title', 'Best Property Malta | '.e($page->page_title))
   <h3 class="form-signup-heading">{{ e($page->page_title) }}</h3>

   <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('pages') }}"
                       class="btn btn-primary">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>

                     @if ($page->page_isDeleted != '1')
                        <span>
                           {{link_to_route('edit_page', 'Edit', array($page->page_id), array('class'=>'btn btn-primary'))}}
                           {{link_to_route('confirm_page_delete', 'Delete', array($page->page_id), array('class'=>'btn btn-danger'))}}
                        </span>
                        {{ Form::token() }}
                        {{ Form::hidden('page_id', $page->page_id) }}
                        
                        {{ Form::close() }}
                     @endif
                </div>
            </div>
            <br>
            <br>
            <br>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td><strong>Title</strong></td>
                    <td><span class="view-data">{{ $page->page_title }}</span></td>
                </tr>
                <tr>
                    <td><strong>Published</strong></td>
                    <td><span class="view-data">{{ $page_published }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Deleted</strong></td>
                    <td><span class="view-data">{{ $page_deleted }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Date Created</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($page->created_at), 'd/m/Y H:m:s')  }}</span></td>
                </tr>
                <tr>
                    <td><strong>Date Updated</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($page->updated_at), 'd/m/Y H:m:s') }}</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>