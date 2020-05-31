<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax curd operation</title>
   
   <link rel="stylesheet" href="css/bootstrap.min.css">

   <script src="js/jquery-.js"></script>
   <script src="js/bootstrap.min.js"></script>

   <script src="js/main.js"></script>
  
     
</head>
<body>
    <div class="container">
    <h1 class="text-center text-primary">php crud operation using Ajax & jquery</h1>

    <!--button add student Record button-->
     <button class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#mymodal">
     Add  Record</button>
    <!--end of Student button-->

    <!--creating modal-->

     
    <div class="modal" id="mymodal"> <!--modal-->
    
    <div class="modal-dialog"><!--modal-dialog-->
    <div class="modal-content" role="document"><!--modal-content-->
      <div class="modal-header"><!--modal-header-->
      <h3 class="text-center">
       Ajax crud operation
      </h3>
     <button class="close" data-dismiss="modal">&times;</button>

      </div><!--end of header-->
     
     <div class="modal-body"><!--modal-body-->
       
       <div class="form-group">
         <label for="firstname"><b>Firstname</b></label>
         <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter your firstname" aria-describedby="helpId"
          required>
         
       </div>

       <div class="form-group">
         <label for="lastname"><b>lastname</b></label>
         <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter your lastname" aria-describedby="helpId" required>
         
       </div>

       <div class="form-group">
         <label for="Email"><b>Email</b></label>
         <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" aria-describedby="helpId" required>
         
       </div>
       
       
      
       <div class="form-group">
         <label for="contact no"><b>contact no</b></label>
         <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter your contact number" aria-describedby="helpId" required>
         
       </div>

       <div class="form-group">
       <button  onclick ="addrecord();" class="btn btn-primary btn-sm" data-dismiss="modal">save </button>
       <button class="btn btn-danger btn-sm ml-5" data-dismiss="modal">cancel </button>
       </div>
       
     </div><!--end of modal-body">
    
    </div><!--end of content-->

    </div><!--end of  modal-dailog-->


    </div> <!--end modal-->
			</div>
	</div>
   
    <!--end of modal-->
   <!--container end-->
     
     <!--update modal-->
        
    <div class="modal" id="updatemymodal"> <!--modal-->
    
    <div class="modal-dialog"><!--modal-dialog-->
    <div class="modal-content" role="document"><!--modal-content-->
      <div class="modal-header"><!--modal-header-->
      <h3 class="text-center">
       update record
      </h3>
     <button class="close" data-dismiss="modal">&times;</button>

      </div><!--end of header-->
     
     <div class="modal-body"><!--modal-body-->
       
       <div class="form-group">
         <label for="firstname"><b>Firstname</b></label>
         <input type="text" name="firstname" id="ufirstname" class="form-control" placeholder="Enter your firstname" aria-describedby="helpId">
         
       </div>

       <div class="form-group">
         <label for="lastname"><b>lastname</b></label>
         <input type="text" name="lastname" id="ulastname" class="form-control" placeholder="Enter your lastname" aria-describedby="helpId" required>
         
       </div>

       <div class="form-group">
         <label for="Email"><b>Email</b></label>
         <input type="email" name="email" id="uemail" class="form-control" placeholder="Enter your Email" aria-describedby="helpId" required>
         
       </div>
       
       
      
       <div class="form-group">
         <label for="contact no"><b>contact no</b></label>
         <input type="text" name="mobile" id="umobile" class="form-control" placeholder="Enter your contact number" aria-describedby="helpId" required>
         
       </div>

       <div class="form-group">
       <button  onclick ="myupdate();" class="btn btn-primary btn-sm" data-dismiss="modal">update </button>
       <button class="btn btn-danger btn-sm ml-5" data-dismiss="modal">cancel </button>
       </div>
       
     </div><!--end of modal-body">
    
    </div><!--end of content-->

    </div><!--end of  modal-dailog-->


    </div> <!--end modal-->
			</div>
     <input type="hidden" id="hiddenid">
     
     
     <!--end of update modal-->
     
      
    <div class="container mt-5" id="content">
    	
    </div>
<script>
	/* read record*/
	$(document).ready(function(){
	readrecord();	
	});
	 
   function readrecord()
	{
		var read = "read";
		$.ajax({
			url:"backend.php",
			type:'post',
			data:{read:read},
			success:function(data,staus)
			{
				$('#content').html(data);
			}
		});
	}
	
	
    function addrecord()
{
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var email = $('#email').val();
    var mobile = $('#mobile').val();
      
    if((firstname=='') || (lastname=='') ||(email=='')|| (mobile==''))
    {
     alert('all filed are required');
     return false;     
    }
    else
    {
        $.ajax({
    url:'backend.php',
    type:'post',
    data:{firstname:firstname,
          lastname:lastname,
          email:email,
          mobile:mobile
        },
    success: function(data,staus)
    {
             if(data)
             {
                 alert('inserted data successfully');
             }
			 readrecord();
    }

    });
    
    }

    

}
	
	function deleteuser(deleteid)
	{
		var cnf = confirm('are you sure to delete data')
		 if(cnf==true)
			 {
		$.ajax({
			url:'backend.php',
			type:'post',
			data:{deleteid:deleteid},
			success:function(data,staus)
			{
				if(data)
				{
					alert('deletedata');
				}
				else
				{
					alert('deletedata not');
				}
				readrecord();
			}
		});
	}
	}
	
	 function getuser(id)
	{
		 $('#hiddenid').val(id);
		
		$.post('backend.php',{id:id},
					 
					 function (data,staus)
					 {
			       var user = JSON.parse(data);
			        var firstname = $('#ufirstname').val(user.firstname);
    					var lastname = $('#ulastname').val(user.lastname);
    					var email = $('#uemail').val(user.email);
    					var mobile = $('#umobile').val(user.contact);
		       }
					);
		$('#updatemymodal').modal('show');
	}
	
	function myupdate()
	{
		        var fname = $('#ufirstname').val();
    					var lname = $('#ulastname').val();
    					var lemail = $('#uemail').val();
    					var lmobile = $('#umobile').val();
							var updateid = $('#hiddenid').val();
		   
		   $.ajax({
				 url:'backend.php',
				 type:'post',
				 data:{fname:fname,
							 lname:lname,
							 lemail:lemail,
							 lmobile:lmobile,
							 updateid:updateid
							},
				 success:function(data,staus)
				 {
					 readrecord();
					  if(data)
						{
						 alert('update successfully data');
						}
					  
				 }
			 });
	}

	
</script>
</body>
</html>