<!DOCTYPE html>
<html lang="en">

 <?php include("include/header.php");?>
  
 <?php
   $obj=new query();
   if(isset($_GET['type'])&& $_GET['type']=='post_slug'){
    
     $s=$_GET['slug'];
	 $condition_arr=array("slug"=>$s);
	 $result=$obj->get_data('posts',"*",$condition_arr);
	  if($result[0]['slug']!=$s){
	   header("location:index.php");
	  }
	  
   }
   else{
   //$condition_arr=array("post_id"=>1);
   $result=$obj->get_data('posts',"*","","","post_id","desc",1);
   }
  
   
  # print("<pre>");
  # print_r($result)
?>
  
  <!-- Page Header -->
  <?php
     if($result){
     foreach($result as $field){
		  $image=$field['post_image'];
		  }}
		  else header("location:index.php")?>
  <header class="masthead" style="background-image: url('upload/<?=$image?>')">
  
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
		    <div class="post-heading">
            <h1><?=$field['post_title']?>
			</h1>
            <h2 class="subheading"><?=$field['post_tagline']?></h2>
            <span class="meta">Posted by Admin
              on <?=$field['post_date']?></span>
          </div>
        </div>
      </div>
    </div>
  </header>


  <!-- Post Content -->

  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
           <p><?php 
		     $str=$field['post_content'];
			  
		   echo wordwrap($str,100,"<br>",TRUE);
		   
              ?>
			  </p>                                      
         </div>
      </div>
    </div>
  </article>

 

   <?php include("include/footer.php")?>

</body>

</html>
