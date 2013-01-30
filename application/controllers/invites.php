<?php

class Invites extends CI_Controller
{
	function index()
	{
		$this->login();

	}

	function login()
	{
		$this->load->view('index');
	}

	function fbinvites()
	{
		$this->load->view('fbinvite.php');
	}

	function save_email()
	{
		log_message('info','enter email_invites method');
		$this->load->model('emailInvites');
		$this->emailInvites->saveEmailInvite();
	}

	function moreinvites()
	{
		$this->load->view('socialInvites');
	}

	function googleinvites()
	{
		$this->load->view('gmailInvites.php');
		
	}

	function saveGmailContacts()
	{
		$this->load->model('gmailInvites');
		echo $this->gmailInvites->saveGmailContacts();
	}

}