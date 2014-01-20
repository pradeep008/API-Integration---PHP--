<?php
include "citrix.php";
include "config.php";
$citrix = new Citrix(Citrix_API_Key);
$citrix->set_organizer_key(OrganizerKey);
$citrix->set_access_token(Auth_Token);
try
{
	$organizer_key = $citrix->get_organizer_key();
	$citrix->pr($organizer_key);
}catch (Exception $e) {	
	$citrix->pr($e->getMessage());
}

try
{
	$webinars = $citrix->citrixonline_get_list_of_webinars() ;
	$citrix->pr($webinars);
}catch (Exception $e) {	
	$citrix->pr($e->getMessage());
}

if(is_array($organizer_key['upcoming']['webinars'])){
	print count($organizer_key['upcoming']['webinars']);
}

