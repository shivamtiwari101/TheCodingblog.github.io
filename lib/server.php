<?php
  include("../include/database.php");
  #print_r($_REQUEST);
  if($_REQUEST['act']){
    $_REQUEST['act']();
}
else{
 header("location:../index.php");
}
function page(){
 
if(isset($_REQUEST['offset'])){
   $obj=new query();
   $result=$obj->get_data("posts","*","","","","");
   $d=count($result);
     if(isset($_REQUEST['step']) && isset($_REQUEST['offset'])){
      $offset=$obj->get_safe($_REQUEST['offset']);
      if($_REQUEST['step']=='prev')
	       $offset+=2;
      else if($_REQUEST['step']=='next')
         $offset-=2;
     }

      if($offset<=0){
        $offset=0;
      
      }else if($offset>=$d-1){
         $offset=$d-1;
        }
     
	 header("location:../index.php?offset=$offset");
    
   }
}
 function post(){
   $obj=new query();
    $title=$obj->get_safe($_POST['title']);
	$content=$obj->get_safe($_POST['content']);
	$tagline=$obj->get_safe($_POST['tagline']);
	$slug=$obj->get_safe($_POST['slug']);
	 
		  if($_FILES['post_image']['name']){
		   $post_image=$_FILES['post_image']['name'];
		   $post_arr=explode(".",$post_image);
		   $post_image=$post_arr[0].time().".".$post_arr[1];
		   move_uploaded_file($_FILES['post_image']['tmp_name'],"../Upload/".$post_image);
		  }
		 else{
				   $post_image=$_REQUEST['post_image'];
				   
				  }
$condition_arr=array("post_title"=>$title,"post_tagline"=>$tagline,"slug"=>$slug,
   "post_content"=>$content,"post_image"=>$post_image);
  if($_REQUEST['id']){
    $result=$obj->update_data('posts',$condition_arr,"post_id",$_REQUEST['id']);
  //echo $_REQUEST['id'];
  }
  
  else{
  $result=$obj->insert_data('posts',$condition_arr);
  }
  header("location:../record.php");
 }
?>
