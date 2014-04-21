<!-- CMS Page Index View -->

@section('title', 'Best Property Malta | Pages')
   <h3 class="form-signup-heading">Pages</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('new_page') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Page
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            @if($pages->count())
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Published</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $published=''; ?>

                    @foreach( $pages as $page )

                        @if ($page->page_isPublished)
                            <?php $published='Yes'; ?>
                        @else
                            <?php $published='No'; ?>
                        @endif

                    <tr>
                        <td><span class="index-data-link">{{ link_to_route( 'page', $page->page_title, $page->page_id, array( 'class' => 'btn btn-link btn-s' )) }}</span></td>
                        <td><span class="index-data">{{{ $published }}}</span></td>
                        <td><span class="index-data">{{{ date_format(new DateTime($page->created_at), 'd/m/Y H:m:s') }}}</span></td>
                        <td><span class="index-data">{{{ date_format(new DateTime($page->updated_at), 'd/m/Y H:m:s') }}}</span></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ URL::route('page', array($page->page_id)) }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Page
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('edit_page', array($page->page_id)) }}">
                                            <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Page
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ URL::route('confirm_page_delete', array($page->page_id)) }}">
                                            <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Page
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-danger">No Pages found</div>
            @endif
        </div>
    </div>


    <div class="pull-right">
        <ul class="pagination">
            {{ $pages->links() }}
        </ul>
    </div>