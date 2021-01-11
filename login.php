
<html>
    <head>
         <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		 
         <style>
		 
		  
		 </style>
    </head>
    <body style="margin:20px;">
	 
	  <div class="container"> 
	        <div class="row" style="padding-left:40%; padding-right:40%;">
			      <div class="col-xs-6 col-xs-offset-3">
				          <form action="lib/login_auth.php" method="post" >
						 <div class="form-group" align="center" >
							 
			<img src="img/user.png" height="70" width="70" style="border-radius:100%;"/>
		    <p>Admin Login</p>						 
							 </div>
						     <div class="form-group">
							  
	<input type="text" class="form-control" name='user' id='user' placeholder="Username" required/>
	<!--required-->						 </div>
							 <div class="form-group">
							 
	<input type="password" class="form-control" name='pass' id='pass' placeholder="Password" required />
 							 </div>
							 <div class="form-group">
	<input type='submit' class="btn  btn-primary form-control" value="Signin"> 
 							 </div>
						  </form>
				  </div>
			   </div>
	  </div>
	   
	  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     </body>
          
</html>