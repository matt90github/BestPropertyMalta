<!-- Official Website View Page -->

@if( isset($page) )
	@section('title', 'Best Property Malta | '.e($page->page_title))
    <h3><?php echo $page->page_title ?></h3>

    <br/>

    <?php echo $page->page_content ?>

    <br/><br/>
@endif