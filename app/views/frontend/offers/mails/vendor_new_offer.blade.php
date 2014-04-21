<!-- Vendor: New Offer Email Template -->

<h2>Hi {{$vendor_firstName}}!</h2>
 
<p>You have just received the following offer:<br/><br/>
	<b>Property:</b> {{$property_name}}<br/>
	<b>Property Status:</b> {{$property_status_name}}<br/>
	<b>Buyer:</b> {{$property_buyer}}<br/>
	<b>Offer Value: </b> {{'€ '. str_replace(".00","",number_format($offer_value, 2, '.', ',')) }} <br/>
	<b>Offer Status:</b> {{$offer_status}}<br/>
</p>  

<p>You can log in to your account on the website to approve or reject this offer.</p>

<br/>

<p>
	Kind Regards,<br/>
	Best Property Malta
</p>