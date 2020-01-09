<?php include 'layout-base.php';
include '../helps/actionsDatabase.php';
$info=selectFirstRow("role, username,name,email","creators", "id_creator=".$_SESSION['id_creator']);?>
<div class="container mt-3">
	 <?php

	 	if(isset($_POST['saveNewInfo'])) {
	 		
	 		updateTable("creators","name='".$_POST['name']."'","id_creator=".$_SESSION['id_creator']);
	 		$_SESSION['nameCreator']=$_POST['name'];

	 		updateTable("creators","username='".$_POST['username']."'", "id_creator=". $_SESSION['id_creator']);

	 		if ($_POST['newPass'] && $_POST['oldPass']) {

	 			$pass=selectFirstRow("*","creators", "id_creator=".$_SESSION['id_creator']." and password=sha2('".$_POST['oldPass']."', 512)");
	 			if ($pass) {
	 				updateTable("creators","password = sha2('".$_POST['newPass']."', 512)","id_creator=".$_SESSION['id_creator']);
	 			
	 				echo "<div class='fixed-bottom alert alert-success alert-dismissible fade show' role='alert'><strong>Password changed!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	 			}else{
	 				echo "<div class='fixed-bottom alert alert-danger alert-dismissible fade show' role='alert'><strong>Wrong password!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	 			}
	 			
	 		}elseif ($_POST['newPass'] && empty($_POST['oldPass'])) {
	 			echo "<div class='fixed-bottom alert alert-danger alert-dismissible fade show' role='alert'><strong>Write old password!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	 		}
	 		header("Refresh:5");
	 	}

	 	?>
	 	<?php
	 	
           		$dirs = array_filter(glob('../img/imatges_perfil/*'), 'is_file');
        			$srcImg="";
        			foreach ($dirs as $key => $value) {
        				if(strpos($value, $_SESSION['id_creator']) != false){
        				$srcImg=$value;
        				}
        			}
        			if (empty($srcImg)) {
        				$srcImg='../img/imatges_perfil/default.png';
        			}

        	     	echo "<div class='text-center'><img class='mb-3 mx-auto' style='max-height: 25vh; padding:5px; background-color: gray;' src='".$srcImg."'></div>";
        	    ?>
     <div class='text-center'>
        	<button type='button' class='btn btn-secondary' data-toggle="modal" data-target="#exampleModal">Change profile image</button>
     </div>

	<form method="post">
		<div class="col-sm-12 col-md-8 col-xl-6 mx-auto input-group mt-3 mb-3">
	  		<div class="input-group-prepend">
	   		 <span class="input-group-text">Name</span>
	  		</div>
	  		<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-name" name='name' value=<?php echo $info['name'];?>>
		</div>

		<div class="col-sm-12 col-md-8 col-xl-6 mx-auto input-group mt-3 mb-3">
	  		<div class="input-group-prepend">
	   		 <span class="input-group-text">Username</span>
	  		</div>
	  		<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-username" name='username' value=<?php echo $info['username'];?>>
		</div>

		<div class="col-sm-12 col-md-8 col-xl-6 mx-auto input-group mt-3 mb-3">
	  		<div class="input-group-prepend">
	   		 <span class="input-group-text">Email</span>
	  		</div>
	  		<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-username" name='username' disabled value=<?php echo $info['email'];?>>
		</div>
		
		<div class="col-sm-12 col-md-8 col-xl-6 mx-auto input-group mt-3 mb-3">
	  		<div class="input-group-prepend">
	   		 <span class="input-group-text">Old Password</span>
	  		</div>
	  		<input type="text" name="oldPass" class="form-control" aria-label="Default" aria-describedby="inputGroup-name";?>
		</div>

		<div class="col-sm-12 col-md-8 col-xl-6 mx-auto input-group mb-3">
	  		<div class="input-group-prepend">
	   		 <span class="input-group-text">New Password</span>
	  		</div>
	  		<input type="passsword" name="newPass" class="form-control" aria-label="Default" aria-describedby="inputGroup-name">
		</div>
		
			<div class="text-center">
				<input type="submit" name="saveNewInfo" value="Save">
			</div>
	  		
		
	</form>

<div id="exampleModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./saveImageRedirect.php" method="post" class="login-form" enctype="multipart/form-data">
	        <div class="form-group">
                      <label for="profileImage">Profile Image</label>
                      <input type="file" class="form-control-file" accept=".png, .jpg, .jpeg, .gif" name="profileImage" id="profileImage">
                  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" value="submit" class="btn btn-primary">Save changes</button></form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	
</div>