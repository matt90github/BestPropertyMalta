<!-- Vendor: Offer Cancelled Email Template -->

<h2>Hi {{$vendor_firstName}}!</h2>
 
<p>The following offer has been cancelled by the buyer:<br/><br/>
	<b>Property:</b> {{$property_name}}<br/>
	<b>Property Status:</b> {{$property_status_name}}<br/>
	<b>Buyer:</b> {{$property_buyer_name}}<br/>
	<b>Offer Value: </b> {{'€ '. str_replace(".00","",number_format($offer_value, 2, '.', ',')) }} <br/>
	<b>Offer Status:</b> {{$offer_status_name}}<br/>
</p>  

<br/>

<p>
	Kind Regards,<br/>
	Best Property Malta
</p>