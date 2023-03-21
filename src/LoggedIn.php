
<?php
abstract class LoggedIn
// This class checks if the user is logged in by checking the 'logged-in' session variable.
// If the variable is set to true, it returns true, otherwise false
{
  public static function isLoggedIn()
  {
    if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] == true) {
      return true;
    } else {
      return false;
    }
  }
}
