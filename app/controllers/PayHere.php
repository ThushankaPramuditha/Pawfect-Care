
<?php 

class PayHere
{
	use Controller;

	public function index()
	{
        $amount = 400;
        $merchant_id =  "1225790";
        $merchant_secret = "MTYxNDE1MDUxOTI1MjYxNDYwMzMyNDEzODMyNTU3MTkxMzA3ODUwNQ==";
        $order_id = uniqid();
        $currency = "LKR";

        $hash = strtoupper(
            md5(
                $merchant_id . 
                $order_id . 
                number_format($amount, 2, '.', '') . 
                $currency .  
                strtoupper(md5($merchant_secret)) 
            ) 
        );
        $array = [];
        $array['first_name'] = "Amandi";
        $array['last_name'] = "Udawatta";
        $array['email'] = "amandi@gmail.com";
        $array['phone'] = "0775555556";
        $array['address'] = "No.1, Galle Road";
        $array['city'] = "Colombo";
        $array['amount'] = $amount;
        $array["items"] = "Online Appointment Booking";
        $array['merchant_id'] = $merchant_id;
        $array['order_id'] = $order_id;
        $array['currency'] = $currency;
        $array['hash'] = $hash;

        $jsonObj = json_encode($array);
        

        echo $jsonObj;
	}

}
