<?php
session_start();
require_once 'login.php';
$conn=new mysqli($hn,$un,$pw,$db);
mysqli_set_charset($conn, 'utf8');
if ($conn->connect_error)die($conn->connect_error);

      $_SESSION['namedelete']=$_GET['name'];
                $name=$_GET['name'];
                
$sql = "DROP TABLE $name";
 $result = mysqli_query($conn,$sql);
                if($result){         
                header('Location:pregled.php');
                }




?>