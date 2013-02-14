<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/invite.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo site_url('css/bootstrap-responsive.css'); ?>"/>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
  <script src="js/invite.js"></script>
  <script type="text/javascript">
    $(document).keypress(function (e) {
      if (e.which == 13) {
        notifyEmail();
        return false; //to prevent the keystroke from continuing
      }
        
    });

    function notifyEmail() {
      if (validateEmail($('#inviteEmail').val())) {
        var form_data = {
                    'email':$('#inviteEmail').val()
                  };
          
        $.ajax({
                url: "index.php/main/email_invites",
                type: 'POST',
                data: form_data,
                success: function(msg) {
                  window.location.href = 'main/social_invites'
                  return true;
                }
        });
      }
      else
      {
        $('#inviteEmail').effect("shake", { times:3 }, 750);
        $('#inviteEmail').val('');
      }
  }
  </script>
  <title>The Savv</title>
</head>
<body class='invite-landing'>
  <div>
    <div class='box'>
      <img src="img/newlogo.png" class='invitelogo'/>
      <span class='baseline'>Market place for the creative soul.</span>
      <span class='notify'>
        <span class='getin'>Get in early</span>
        <input type='text' id='inviteEmail' placeholder='Enter email'/>
        <a href='#' name='email' id='invite-all' onclick='notifyEmail();' class='btn'>Notify Me</a>
      </span>
    </div>
    
  </div>
</body>
</html>