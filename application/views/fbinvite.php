<!doctype html>
<html>
<head>
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  	  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
      <script type="text/javascript" src="<?php echo site_url('js/jquery.facebook.multifriend.select.js'); ?>"></script> 
        <link rel="stylesheet" href="<?php echo site_url('css/jquery.facebook.multifriend.select.css'); ?>" /> 
        <style> 
            body {
                background: #fff;
                color: #333;
                font: 11px verdana, arial, helvetica, sans-serif;
            }
            a:link, a:visited, a:hover {
                color: #666;
                font-weight: bold;
                text-decoration: none;
            }
        </style> 
     
     <script type="text/javascript">

        function login()
        {
            FB.login
            (
                function( response )
                {
                    if ( response.authResponse )
                    {
                        FB.api
                        (
                            "/me",
                            function( response )
                            {
                                document.getElementById( "profile_name" ).innerHTML = response.name;
                                document.getElementById( "list" ).innerHTML = "http://graph.facebook.com/" + response.id + "/friends";
                            }
                        )
                    }
                }
            );
        }

        /*function getFriends() {
        	alert('1');
		    FB.api('/me/friendlists/close_friends?fields=members', function(response) {
		    	//alert('2:'+response.data);
		        if(response.data) {
		            $.each(response.data,function(index,friend) {
		                alert(friend.name + ' has id:' + friend.id);
		                //$( "list" ).append = response.name;
		            });
		        } else {
		            alert("Error!");
		        }
		    });
		}*/

        function getCloseFriends()
        {
            FB.api('/me', function(response) {
                $("#username").append("<img src='https://graph.facebook.com/" + response.id + "/picture'/><div>" + response.name + "</div>");
                $("#jfmfs-container").jfmfs({ 
                          
                          max_selected_message: "{0} of {1} selected",
                          friend_fields: "id,name,last_name",
                          pre_selected_friends: [1014025367],
                          exclude_friends: [1211122344, 610526078],
                          sorter: function(a, b) {
                            var x = a.last_name.toLowerCase();
                            var y = b.last_name.toLowerCase();
                            return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                          }
                      });
                      $("#jfmfs-container").bind("jfmfs.friendload.finished", function() { 
                          window.console && console.log("finished loading!"); 
                      });
                      $("#jfmfs-container").bind("jfmfs.selection.changed", function(e, data) { 
                          window.console && console.log("changed", data);
                      });                     
                      
                      $("#logged-out-status").hide();
                      $("#show-friends").show();
            });
        }

     </script>
</head>
<body>
	<div id="fb-root"></div>
	<script>

        window.fbAsyncInit = function()
        {
            FB.init
            (
                {
                    appId   : "109036532604620",
                    channelUrl:"http://localhost/testsaav/channel.html",
                    status  : true,
                    cookie  : true,
                    oauth   : true
                }
            );

        FB.getLoginStatus(function(response) {
          if (response.status === 'connected') {
            getCloseFriends();
          } else if (response.status === 'not_authorized') {
            login();
            getCloseFriends();
          } else {
            login();
            getCloseFriends();
          }
         });

        };

        (function(d, debug){
	     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement('script'); js.id = id; js.async = true;
	     js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
	     ref.parentNode.insertBefore(js, ref);
	   }(document, /*debug*/ false));
    </script>    
    <img id="profile_pic"/>
    <pre id="list"></pre>
    <div id="profile_name"></div>
    <div> 
        <div id="username"></div>
        <div id="selected-friends" style="height:30px"></div> 
        <div id="jfmfs-container"></div>
    </div> 
</body>
</html>