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


	function gmail_invite()
	{
		$gmailContacts = array();
		$client = new Google_Client();
		$client->setApplicationName('The Savv');
		$client->setScopes("http://www.google.com/m8/feeds/");
		$client->setClientId('324601345918.apps.googleusercontent.com');
		$client->setClientSecret('6PLwwpqfHgSuGw-fJMZuMMSW');
		$client->setRedirectUri('http://localhost/testsaav/index.php/main/gmail_invite');
		
		if (isset($_GET['code'])) {
		  $client->authenticate();
		  $_SESSION['token'] = $client->getAccessToken();
		  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
		  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])) {
		 $client->setAccessToken($_SESSION['token']);
		}

		if (isset($_REQUEST['logout'])) {
		  unset($_SESSION['token']);
		  $client->revokeToken();
		}

		if ($client->getAccessToken()) {
		  $req = new Google_HttpRequest("https://www.google.com/m8/feeds/contacts/default/full?max-results=500");
		  $val = $client->getIo()->authenticatedRequest($req);
		  $xml = simplexml_load_string($val->getResponseBody());
		  $result = $xml->xpath('//gd:email');
		  //print "<pre>" .print_r($result,false). "</pre>";
		  foreach ($result as $title) {
		    array_push($gmailContacts, mysql_real_escape_string($title->attributes()->address));
		  }
		  // The contacts api only returns XML responses.
		  //$response = json_encode(simplexml_load_string($val->getResponseBody()));
		  
		  //print "<pre>" . print_r(json_decode($response, true), true) . "</pre>";

		  // The access token may have been updated lazily.
		  $_SESSION['token'] = $client->getAccessToken();
		} else {
			
		  redirect($client->createAuthUrl());
		}

		$this->load->model('gmailInvites');
		$data['inviteemail'] = $_SESSION['email'];
		$data['gmailContacts'] = $gmailContacts;
		$this->gmailInvites->saveGmailContacts($data);

		$this->load->view('gmailInvites.php');
		
	}

	function saveGmailContacts()
	{
		$this->load->model('gmailInvites');
		echo $this->gmailInvites->saveGmailContacts();
	}

}