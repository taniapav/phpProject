<?php
$users = new users();
require_once 'regex.php';

if(!empty($_GET['deleteId'])){
  $users->id = $_GET['deleteId'];
  $users->deleteUsers();

}
$usersList = $users->getUsersList();
 ?>
