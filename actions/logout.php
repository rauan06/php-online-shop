<?

session_start();
unset($_SESSION['role']);
unset($_SESSION['id']);
unset($_SESSION['cart']);
header("Location:../index.php");

?>