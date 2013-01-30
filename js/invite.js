function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if( $email=='' || !emailReg.test( $email ) ) {
    return false;
  } else {
    return true;
  }

}