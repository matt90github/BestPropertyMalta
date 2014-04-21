<!-- Buyer: Updated Offer Email Template -->

<h2>Hi {{$buyer_firstName}}!</h2>
 
<p>You have just updated the following offer:<br/><br/>
	<b>Property:</b> {{$property_name}}<br/>
	<b>Property Status:</b> {{$property_status_name}}<br/>
	<b>Vendor:</b> {{$property_vendor}}<br/>
	<b>New Offer Value: </b> {{'€ '. str_replace(".00","",number_format($offer_value, 2, '.', ',')) }} <br/>
	<b>Offer Status:</b> {{$offer_status}}<br/>
</p>  

<p>The vendor has been notified accordingly.</p>

<br/>

<p>
	Kind Regards,<br/>
	Best Property Malta
</p>