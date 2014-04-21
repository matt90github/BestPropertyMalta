<!-- Official Website Search Results Page -->

@section('title', 'Best Property Malta | Search Results')

<h3 class="form-signup-heading">Search Results for "{{e($searchterms)}}"</h3>

<div class="search-section-title">Properties</div>

@if($properties->count())
    <ul>
        @foreach($properties as $property)
            <div class="search-link">
                <a href="{{ URL::route('webproperty', $property->property_id) }}">
                    <li class="search-result">
                        {{$property->property_name}}
                    </li>
                </a>
            </div>
        @endforeach
    </ul>
@else
    <ul>
        <div class="no-search-result">
            <li>
                No Properties Found
            </li>
        </div>
    </ul>
@endif

<div class="search-section-title">Pages</div>

@if($pages->count())
    <ul>
        @foreach($pages as $page)
            <div class="search-link">
                <a href="{{ URL::route('webpage', $page->page_id)}}">
                    <li class="search-result">
                       {{$page->page_title}}
                    </li>
                </a>
            </div>
        @endforeach
    </ul>
@else
    <ul>
        <div class="no-search-result">
            <li>
                No Pages Found
            </li>
        </div>
    </ul>
@endif