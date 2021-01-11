<?php
   session_start();
  
    include("../include/database.php"); 
	$obj=new query();
	  if(isset($_GET['name'])&& $_GET['name']=='logout'){
	 if(isset($_SESSION['user'])){
		            $_SESSION['user']='';
				    $_SESSION['pass']='';
				    session_destroy();
			        header("location:../login.php");
					
				  }
				else{
				  header("location:../index.php");
				}	
	}
		  
				  
		      
  
   if($_REQUEST['user']){
	$user=$obj->get_safe($_REQUEST['user']);
	$pass=$obj->get_safe($_REQUEST['pass']);
	$condition_arr=array("login_user"=>$user,"login_pass"=>$pass);
   $result=$obj->get_data("login","*",$condition_arr); 
   if($result){
   $_SESSION['user']=$_REQUEST['user'];
   $_SESSION['pass']=$_REQUEST['pass'];
   header("location:../record.php");
   }
   else{
    header("location:../login.php");
   }
   }
    else{
	 header("location:../index.php");
	 }
	l
  
   
	
?>