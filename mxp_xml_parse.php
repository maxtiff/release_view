<?php

$xml_path = 'C:\Users\h1tjm03\Documents\release_view\\';
$xml_file = 'enduse_exports.xml';
$full_file_path = $xml_path.$xml_file;

$xml_base_url = "http://api.stlouisfed.org/fred/release/series?release_id=";

$xml_release_id = "188";

$xml_url_api = "&api_key=76bb1186e704598b725af0a27159fdfc";

$xml_order_parameter = "&order_by=series_id";

$xml_tags_paramter = "&tag_names=exports;end+use";

$full_xml_url = $xml_base_url.$xml_release_id.$xml_url_api.$xml_order_parameter.$xml_tags_paramter;

echo $full_xml_url;

echo $full_file_path;


$ch = curl_init();
$download_obj = curl_exec($ch);
$USERAGENT = "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0";
$proxy = "http://h1proxy.frb.org:8080/";

curl_setopt($ch, CURLOPT_URL, $full_xml_url);
curl_setopt($ch, CURLOPT_USERAGENT, $USERAGENT);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);

while (!isset($download_obj) || $download_obj === false || preg_match("/\<\!DOCTYPE HTML PUBLI/", $download_obj)) 
	{
		$download_obj = curl_exec($ch);
	}
	

$data = simplexml_load_file($download_obj);

var_dump($data);

foreach ($data as $series) {
	echo $series->row;
}

?>
