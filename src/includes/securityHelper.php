<?php 

/**
 * Compares the hashed csrf token generated at the login, and the hashed token sent into the post 
 * @return bool is invalid csrf token 
 * */  
function isCSRFTokenValid() : bool {
  return (isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']));
}


/**
 * Logs out if the hashed csrf token generated at the login, and the hashed token sent into the post
 */
function logoutIfCSRFTokenIsNotValid() {
  if (!isCSRFTokenValid()) {
    alert('Votre session est corrompue, veuillez vous identifier à nouveau');
    logout();
    die;
  }
}