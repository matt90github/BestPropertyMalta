<!-- Official Website My Properties Page -->

@section('title', 'Best Property Malta | My Properties')
<h3 class="form-signup-heading">My Properties</h3>

<br/>

    <div class="row" id="pics">
        @if($properties!=null)
            @if($properties->count())
                @foreach($properties as $property)

                    <div class="col-sm-3">
                        <div class="caption">

                            <a href="{{ route('webproperty', array('property_id' => $property->property_id)) }}">
                             
                            <?php $property_locationName = '' ?>
                            <?php $property_typeName = '' ?>
                            <?php $property_statusName = '' ?>
                            
                            @foreach( $propertylocations as $propertylocation )
                                @if ($property->property_locationId == $propertylocation->location_id)
                                    <?php $property_locationName = $propertylocation->location_name; ?>
                                @endif
                            @endforeach

                            @foreach( $propertytypes as $propertytype )
                                @if ($property->property_typeId == $propertytype->property_type_id)
                                    <?php $property_typeName = $propertytype->property_type_name; ?>
                                @endif
                            @endforeach

                            @foreach( $propertystatuses as $propertystatus )
                                @if ($property->property_statusId == $propertystatus->property_status_id)
                                    <?php $property_statusName = $propertystatus->property_status_name; ?>
                                @endif
                            @endforeach

                            <?php  $imageUrl = 'img/bestproperty.png';?>

                            @if($propertyimages!=null)
                                @foreach($propertyimages as $propertyimage)
                                    @if ($property->property_id == $propertyimage->image_propertyId)
                                        @if ($propertyimage->image_isPrimary == '1')
                                            <?php  $imageUrl = 'uploads/' . $propertyimage->image_propertyId . '/' . $propertyimage->image_name;?>
                                        @endif
                                    @endif
                                @endforeach
                            @endif

                            {{ HTML::image($imageUrl,$property->property_name, array('class' => 'prop-img-responsive-index img-thumbnail', 'style' => 'display: block; margin: 0 auto;')) }}
                            
                            <div class='caption__overlay'> 
                                {{ Form::label('property_nameprice', $property->property_name.', € '.str_replace(".00","",number_format($property->property_price, 2, '.', ',')), array('class'=>'index-property-label caption__overlay__title')) }} 
                                {{ Form::label('property_type', 'Type: '.$property_typeName, array('class'=>'index-property-label caption__overlay__content')) }} 
                                {{ Form::label('property_location', 'Location: '.$property_locationName, array('class'=>'index-property-label caption__overlay__content')) }}
                                {{ Form::label('property_price', 'Price: € '.str_replace(".00","",number_format($property->property_price, 2, '.', ',')), array('class'=>'index-property-label caption__overlay__content')) }} 
                                {{ Form::label('property_status', 'Status: '.$property_statusName, array('class'=>'index-property-label caption__overlay__content')) }} 
                            </div>
                            </a>
                        </div>
                    </div>

                @endforeach
            @else
                <div class="alert alert-danger">No Properties Found</div>
            @endif
        @else
          <div class="alert alert-danger">No Properties Found</div>
        @endif

    </div>

    @if($properties!=null)
        @if($properties->count())
            <div class="pull-right">
                <ul class="pagination">
                {{ $properties->appends(array_except(Input::query(), 'page'))->links() }}
                </ul>
            </div>
        @endif
    @endif