<!DOCTYPE html>
<html lang="en">
 <?php include("include/header.php")?> 
 <?php
 session_start();
 
 if(isset($_SESSION['user'])){
   $obj=new query();
   if(isset($_GET['type'])&& $_GET['type']=='delete'){
    
    $id=$obj->get_safe($_GET['id']);
	$condition_arr=array("post_id"=>$id);
	 $result=$obj->get_data("posts","post_image",$condition_arr);
      $image=$result[0]['post_image'];
	 if($image){
	 unlink("upload/".$image);}
	 
	$result=$obj->delete_data('posts',$condition_arr);
	
   }
   $result=$obj->get_data("posts");
 }
 else{
 header("location:index.php");
 }
 ?>
  
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

  <!-- Main Content Record-->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
	      <table class="table"> 
		 <thead>
		  <tr>
		  <th>Sno.</th>
		  <th>Title</th>
		  <th>Date</th>
		  <th>Action </th>
		  <td><a class="btn btn-primary" href="add_post.php">+</a></td>
		  <td>
		    
		  <a class="btn btn-danger " href="lib/login_auth.php?name=logout">&cup;</a></td>
		  
		  </tr> 
		   
		  </thead>
		  <?php $n=1;foreach($result as $f){?>
		   <tbody>
		  <tr>
		  <td><?=$n?></td>
		  <td><?=$f['post_title']?></td>
		  <td><?=$f['post_date']?></td>
		  <td>
		  <a class="btn btn-primary" href="add_post.php?edit_id=<?=$f['post_id']?>">Edit</a>
		  </td>
		  <td>
          <a class="btn btn-primary" href="?type=delete&id=<?=$f['post_id']?>">Delete</a>
		  </td>
		  </tr>
		  </tbody>
		  <?php $n++;}?>
		  
          </table>
		   
      </div>
    </div>
  </div>

  <?php include("include/footer.php")?>
</body>

</html>
