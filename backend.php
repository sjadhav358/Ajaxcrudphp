<?php

$conn = mysqli_connect('localhost','root',"",'crud');
 extract($_POST);

 if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile']))
 {
    $sql= " INSERT INTO `record`( `firstname`, `lastname`, `email`, `contact`) VALUES ('$firstname','$lastname','$email','$mobile')";
    
    $result= mysqli_query($conn,$sql);
    if($result)
    {
        echo"data inserted";
    }
    else
    {
        echo"data not inserted";
    }
 }
else
{
	

}

if(isset($_POST['read']))
{
	$data ='<table class="table table-striped table-bordered">
	        <th>no</th>
					<th>name</th>
					<th>lastname</th>
					<th>email</th>
					<th>mobile no</th>
					<th>Action </th>
					<tr>';
	
	   $sql ="select * from  record ";
	   $result = mysqli_query($conn,$sql);
	  if(mysqli_num_rows($result)>0)
		{
			$number=1;
			while($row = mysqli_fetch_array($result))
			{
				$data.='<tr>
				       <td>'.$number.'</td>
				       <td>'.$row['firstname'].'</td>
							 <td>'.$row['lastname'].'</td>
							 <td>'.$row['email'].'</td>
							 <td>'.$row['contact'].'</td>
							 <td>
							 <button onclick="getuser('.$row['id'].');" class="btn btn-sm btn-success">
							 Edit</button>
							 
							 <button onclick="deleteuser('.$row['id'].');" 
							 class="btn btn-sm btn-danger">
							 Delete</button>
							 </td>
							 
				   </tr>';
				$number++;
			}
		}
	      
	$data.='</table>';
	echo $data;
}

if(isset($_POST['deleteid']))
{
	
	$userid= $_POST['deleteid'];
	
	$sql="delete from record where id='$userid'";
	$result = mysqli_query($conn,$sql);
	
	if($result)
	{
		echo"data deleted";
	}
	else
	{
		echo "not deleted";
	}
}

 //get userid for update//

  if(isset($_POST['id']))
	{
		$userid = $_POST['id'];
		
		$query = "select * from record where id ='$userid'";
		 $result = mysqli_query($conn,$query);
		
		$res = array();
		
		 if(mysqli_num_rows($result)>0)
		 {
			 while($row = mysqli_fetch_array($result))
			 {
				 $res = $row;
			 }
			 
		 }
		else
		{
			$res['staus']=200;
			$res['message']='data not found';
		}
		 echo json_encode($res);
	}
   else
	 {
		 $res['staus']=200;
			$res['message']='invalide request';
	 }

 //update table//
  if(isset($_POST['updateid']) && isset($_POST['fname'])&& isset($_POST['lname'])&&
		
		isset($_POST['lemail'])&& isset($_POST['lmobile']))
	
	{
	
		
		$sql = "UPDATE `record` SET `firstname`='$fname',`lastname`='$lname',
		`email`='$lemail',`contact`='$lmobile' WHERE  id='$updateid' ";
		$result = mysqli_query($conn,$sql);
		 
		if($result)
		{
			echo "update data succefully";
		}
	}


?>