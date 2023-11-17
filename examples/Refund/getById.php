<?php
/**
* This endpoint allows you to retrieve detailed information about an order based on its unique identifier (ID).
* To use this endpoint, simply provide the appropriate order ID as a route parameter.
* 
**/

require_once 'paycadoo-php/PaycadooClient.php';

$client = new PaycadooClient("<YOUR_API_KEY>");
$client->refund->getById("f785f111-3753-4acb-bd37-b001196bf1b7");