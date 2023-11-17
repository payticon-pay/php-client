<?php

class PaycadooHttpClient {
	/**
	* @var string	
	**/
	protected $url;
	/**
	* @var array[string]string	
	**/
	protected $headers;
	/**
	* @param string $url
	* @param string $apiKey	
	**/
	public function __construct($url, $apiKey)
	{
		$this->url = $url;
		$this->headers = array(
		    'Content-Type: application/json',
		    "X-Api-Key: $apiKey"
		);
	}

	/**
	* @param string $path
	* @param array $query
	* @return array
	* @throws Exception	
	**/
	public function get($path, $query = array())
	{
		$url = $this->url . $path;
		if (count($query) > 0)  {
		    $url .= "?". http_build_query($query);
		}
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		return $this->execute($curl);
	}

	/**
	* @param string $path
	* @param array $data
	* @return array
	* @throws Exception	
	**/
	public function post($path, $data)
	{
		$curl = curl_init($this->url . $path);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		return $this->execute($curl);
	}

	/**
	* @param resource $curl
	* @return array
	* @throws Exception	
	**/
	protected function execute($curl)
	{
		$body = json_decode(curl_exec($curl), true);
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		if ($status != 200) {
		    throw new Exception(json_encode($body), $status);
		}
		return $body;
	}
}