<?php
 class database{
       private $host;
	   private $username;
	   private $password;
	   private $database;
	   protected function connect(){
	     $this->host='localhost';
		 $this->username='root';
		 $this->password='';
		 $this->database='coding_blog';
		 $con=new mysqli($this->host,$this->username,$this->password,$this->database);
		     return $con;
	   }
}
class query extends database{
          //$field='*';
 function get_data($table,$field='*',$condition_arr='',$like='',$order_by_field='',$order_by_type='desc',$limit='',$offset=''){
       
	  $sql=" select $field from $table";
	 # print_r(count($condition_arr));
	   if($condition_arr!=''){
	        # print_r($condition_arr);
			$sql.=" where ";
			$c=count($condition_arr);
			$i=1;
			foreach($condition_arr as $key=>$val){
			      if($i==$c){
				  $sql.=" $key='$val' ";
				  }
				  else{
		      	$sql.=" $key='$val' and";
				}
				$i++;
			}
	     }
	    if($order_by_field!=''){
		$sql.=" order by $order_by_field $order_by_type ";
		}
	    if($limit!=''){
		  $sql.=" limit $limit ";
		}
		if($offset!=''){
		  $sql.=" offset $offset ";
		}
	     
	   
	    #die($sql);
	   $result=$this->connect()->query($sql);
	   if($result->num_rows>0){
	      $arr=array();
	     while($row=$result->fetch_assoc()){
		 
		    $arr[]=$row;
			
		 }
		 return $arr;
	   }
	   else{
	   return 0;
	   }
	 #  print_r($result);
	  }
	  //insert function ..........
	
	function insert_data($table,$condition_arr=''){
       
	  
	 # print_r(count($condition_arr));
	   if($condition_arr!=''){
	        # print_r($condition_arr);
			foreach($condition_arr as $key=>$val){
			 $field_arr[]=$key;
			 $value_arr[]=$val;         
			}
			$field=implode(",",$field_arr);
			$value=implode("','",$value_arr);
			$value="'".$value."'";
			#die();
			$sql=" insert into $table($field) values ($value)";
	     }
	    
	   
	    //echo($sql);
		$result=$this->connect()->query($sql);
	  } 
	   
  //Delete function ..........
	
	function delete_data($table,$condition_arr=''){
       
	  
	 # print_r(count($condition_arr));
	     
		 if($condition_arr!=''){
		 $sql=" delete from $table";
			$sql.=" where ";
			$c=count($condition_arr);
			$i=1;
			foreach($condition_arr as $key=>$val){
			      if($i==$c){
				  $sql.=" $key='$val' ";
				  }
				  else{
		      	$sql.=" $key='$val' and";
				}
				$i++;
			}
	     }
	    //echo($sql);
		$result=$this->connect()->query($sql);
	  }
	  
	   //update function ..........
	
	function update_data($table,$condition_arr='',$where_field,$where_value){
       
	  
	 # print_r(count($condition_arr));
	     
		 if($condition_arr!=''){
		 $sql=" update $table set ";
			$c=count($condition_arr);
			$i=1;
			foreach($condition_arr as $key=>$val){
			      if($i==$c){
				  $sql.=" $key='$val' ";
				  }
				  else{
		      	$sql.=" $key='$val' ,";
				}
				$i++;
			}
			$sql.=" where $where_field='$where_value'";
	     }
	      //echo($sql);
		$result=$this->connect()->query($sql);
	  }
	  
	  public function get_safe($str){
	   if($str!=''){
	   return mysqli_real_escape_string($this->connect(),$str);
	   }
	  }
}

?>
 
