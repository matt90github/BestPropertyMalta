<!-- Official Website Newsletter Email Template -->

<h2>Hi {{$customer_firstName}}!</h2>
 
<p>The following are the latest properties for sale:<br/><br/>

    @foreach($latestproperties as $property)
        <?php $property_locationName = '' ?>
        <?php $property_typeName = '' ?>
        <?php $property_statusName = '' ?>
        <?php  $imageUrl = 'img/bestproperty.png';?>

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
        
        <a href="{{ route('webproperty', array('property_id' => $property->property_id)) }}">
            <b><h3>{{$property->property_name}}</h3></b>
        </a>

        <b>Price:</b> {{'€ '.str_replace(".00","",number_format($property->property_price, 2, '.', ',')) }}<br/>
        <b>Type:</b> {{$property_typeName}}<br/>
        <b>Location:</b> {{$property_locationName}}<br/><br/>
    @endforeach

<br/>

<p>
    Kind Regards,<br/>
    Best Property Malta
</p>