<?php

class GmailInvites extends CI_Model {
  function saveGmailContacts() {
    $contacts = $this->input->post('contacts');
    $this->db->insert('importedgmailcontacts',$contacts);
  }
}