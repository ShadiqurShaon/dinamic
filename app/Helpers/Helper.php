<?php
namespace App\Helpers;
use GuzzleHttp\Client;

class Helper
{
	public static  function apicall($property)
	{
		$address = $property;

    	 $split = explode(',', $address,2);

		 $string = 'address='.urlencode($split[0]).'&citystatezip='.urlencode($split[1]);


		 $zillourl = 'https://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=X1-ZWz17rs5qz1gjv_517ck&'.$string;

		 $client = new \GuzzleHttp\Client();

		 $response = $client->request('GET',$zillourl);

		 $xml = simplexml_load_string($response->getBody(),'SimpleXMLElement',LIBXML_NOCDATA);

		 $json = json_encode($xml);

		 $array = json_decode($json, true);

		 $array_dot = array_dot($array);

		 $collection = collect($array);

    	 // return $collection['request']['address'];
    	 return $collection['response']['results']['result'];
	}
}