<?php 
include "citrix.php";
include "config.php";
$citrix = new Citrix(Citrix_API_Key);
$citrix->set_organizer_key(OrganizerKey);
$citrix->set_access_token(Auth_Token);
$Ajaxoutput = '';
$webinarkey = $_REQUEST['wkey'];
if($webinarkey!=''){
$registrantslst = $citrix->get_registrants_of_webinars($webinarkey) ;
if(is_array($registrantslst)){
	$Ajaxoutput .= '<div style="padding-top:15px"></div><div align="center"> <label> <b> Registrants List </b> <div style="padding-top:5px"></div></label><table id="mytable" cellspacing="0">
	  <tr>
		<th scope="col">FirstName</th>
		<th scope="col">LastName</th>
		<th scope="col">Email</th>
	  </tr>';
	for($j=0; $j<count($registrantslst); $j++){
			$Ajaxoutput .= '<tr>';
			$Ajaxoutput .= '<td>'.$registrantslst[$j][firstName].'</td>';
			$Ajaxoutput .= '<td>'.$registrantslst[$j][lastName].'</td>';
			$Ajaxoutput .= '<td>'.$registrantslst[$j][email].'</td>';
			$Ajaxoutput .= '</tr>';
		}
	}
}
$Ajaxoutput .= '</table></div>';
print $Ajaxoutput;
?>
