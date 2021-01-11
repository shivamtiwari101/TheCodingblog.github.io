<!DOCTYPE html>
<html lang="en">
 <?php include("include/header.php");
 session_start();
 if(isset($_SESSION['user'])){
  $obj=new query();
  $btn="save";
  $title="";
  $content="";
  $tagline="";
  $slug="";
  $id="";
  $btn="save";
   $file="Upload Image"; 
  //echo"$eid";
    if(isset($_GET['edit_id'])&& $_GET['edit_id']!=''){
	$id=$_GET['edit_id'];
	$condition_arr=array("post_id"=>$id);
	
	$result=$obj->get_data('posts',"*",$condition_arr);
	$title=$result['0']['post_title'];
	$content=$result['0']['post_content'];
	$tagline=$result['0']['post_tagline'];
	$slug=$result['0']['slug'];
	$post_image=$result['0']['post_image'];
	
	$btn="update";
	 $file="EditImage";
	//echo $title."".$content."".$tagline."".$slug;
	}
	else{
	 $btn="save";
	 $file="Upload Image"; 
	}
	  	//echo $id;
   /* if(isset($_POST['submit'])){
    $title=$_POST['title'];
	$content=$_POST['content'];
	$tagline=$_POST['tagline'];
	$slug=$_POST['slug'];
	 
	//$btn="save";
	$condition_arr=array("post_title"=>$title,"post_tagline"=>$tagline,"slug"=>$slug,
   "post_content"=>$content);
	if($_REQUEST['eid']){
	echo $eid."if";
     //$result=$obj->insert_data('posts',$condition_arr);
	 }
   else{
   echo $eid."else";
    //$result=$obj->update_data('posts',$condition_arr,"post_id",$id);
   }
 }
    //header("location:record.php");
   
   
  // print_r($_POST);*/
  }
  else{
  header("location:index.php");
  }
 ?> 
   
  
  <!-- Page Header--> 
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>The Coding Blog</h1>
            <span class="subheading">A Blog liked by Programmers</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content-->
  <div class="container">
    <div class="row">
      <div class="col-xs-8 col-lg-4 col-md-10 mx-auto">
	    <form action="lib/server.php" method="post" enctype="multipart/form-data">
		 
		  <div class="form-group">
		 <label>PostTitle</label>
<input type="text" name="title"  id="title" class="form-control" required 
value="<?=$title?>"/>
		 </div>
 <div class="form-group">
		 <label>TagLine</label>
<input type="text" name="tagline"  id="tagline" class="form-control" required 
value="<?=$tagline?>"/>
		 </div>
		 <div class="form-group">
		 <label>PostSlug</label>
<input type="text" name="slug"  id="slug" class="form-control" required 
value="<?=$slug?>"/>
		 </div>
		 <div class="form-group">
		 <label>PostContent</label>
		 <textarea class="form-control" required name="content"><?=$content?></textarea>
		 </div>
		 <div class="form-group">
		 <label>
		   
<p style="color:white; font-weight:bolder;cursor:pointer; background:black;width:140px;text-align:center;">
		 <?=$file;?>
		 </p>
		 <span>
		 <?php if(isset($post_image)){
		 echo"<p>".$post_image."</p>";
		   } ?>
		 </span>
		  <input type="file" name="post_image" id="post_image" style="display:none;"/></label>
		  <?php if(isset($post_image)){?>
		  <span>
		  <a href="upload/<?=$post_image?>">
		  <img src="upload/<?=$post_image?>" height="150" width="400" alt="image not found!">
		  </a>
		  </span>
		  <?php }?>
		 </div>
		  
		  <input type="hidden" value="<?=$id?>" name="id" id="id"/>
		  <input type="hidden" name="act" value="post"/>
	<input type="hidden"  name="post_image"  id="post_image" value="<?=$post_image?>"/>
	<input type="submit" value="<?=$btn?>" class="btn btn-primary" name="submit"/>
     
		</form>
      </div>
    </div>
  </div>

  <?php include("include/footer.php");?>
</body>
</html>