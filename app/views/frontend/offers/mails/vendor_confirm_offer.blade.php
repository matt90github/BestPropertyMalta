<!-- Vendor: Offer Confirmed Email Template -->

<h2>Hi {{$vendor_firstName}}!</h2>
 
<p>You have successfully confirmed the following offer:<br/><br/>
	<b>Property:</b> {{$property_name}}<br/>
	<b>Property Status:</b> {{$property_status_name}}<br/>
	<b>Buyer:</b> {{$property_buyer_name}}<br/>
	<b>Offer Value: </b> {{'€ '. str_replace(".00","",number_format($offer_value, 2, '.', ',')) }} <br/>
	<b>Offer Status:</b> {{$offer_status_name}}<br/>
</p>  

<p>The buyer has been notified accordingly.</p>

<br/>

<p>
	Kind Regards,<br/>
	Best Property Malta
</p>