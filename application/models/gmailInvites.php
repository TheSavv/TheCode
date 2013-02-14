<?php

class GmailInvites extends CI_Model {
  function saveGmailContacts($data) 
  {
  	 $contacts = $data['gmailContacts'];
  	 $inviteEmail = $data['inviteemail']; 	
  	 echo('<pre>');
  	 echo($inviteEmail);
  	 echo('</pre>');
  	foreach ($contacts as $email) {
  		$sql = "INSERT INTO gmail_invites(email) VALUES ('$email')";	
  		$this->db->query($sql);
  	}
    
  }
}