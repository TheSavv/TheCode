<?php

class EmailInvites extends CI_Model {

	function saveEmailInvite() {
		$date = date("Y-m-d H:i:s");
		$new_email = array(
			'email' => $this->input->post('email'),
			'timestamp' => $date
		);

		$insert = $this->db->insert('email_invites', $new_email);
		return $insert;
	}


}