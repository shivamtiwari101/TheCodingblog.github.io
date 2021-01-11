<!DOCTYPE html>
<html lang="en">
 <?php include("include/header.php")?>
  <!-- Page Header -->
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

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
	   <form method="post" action="lib/server.php">
	   <?php 
	    $obj=new query();
   $result=$obj->get_data("posts","*","","","","");
   $d=count($result);
	   $obj=new query();
	       
              if(isset($_REQUEST['offset'])){
			    $offset=$obj->get_safe($_REQUEST['offset']);
				//$id=$obj->get_safe($_GET['id']);
                 }else{				
	                 $offset=0;
                   }
				   if($offset>=$d)
				      $offset=0;
				   
         $result=$obj->get_data("posts","*","","","post_id","desc",2,$offset);
		 if($result){
		foreach($result as $f){
		  ?>
        <div class="post-preview">
          <a href="post.php?type=post_slug&slug=<?=$f['slug']?>">
            <h2 class="post-title">
               <?=$f['post_title']?>
            </h2>
			
            <h3 class="post-subtitle">
               <?=$f['post_tagline']?>
            </h3>
			<span><img src="upload/<?=$f['post_image']?>" height="100" width="300"></span>
          </a>
          <p class="post-meta">Posted by
            <a href="about.php">Admin</a>
            on <?=$f['post_date']?></p>
			
        </div>
		<p>
		
		<?php $str=$f['post_content'];
		      $strlen =strlen($str);
			  for($i=0;$i<=100;$i++){
			    echo $str[$i];
			  }
		   ?>
		</p>
		
        <hr>
		<?php 
		}}else{
		  header("location:index.php");
		}?>
         <!-- Pager -->
        <div class="clearfix">
		<input type="submit" value="prev" class="btn btn-primary float-left" name="step" id="step">
		<input type="hidden" value="<?=$offset?>" name="offset"/>
		<input type="hidden" value="page" name="act"/>
		<input type="submit" value="next" class="btn btn-primary float-right" name="step" id="step">
		</form>
		 
        </div>
      </div>
    </div>
  </div>

  <?php include("include/footer.php")?>
</body>

</html>