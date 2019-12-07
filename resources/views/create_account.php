<!DOCTYPE html>
<html>
	<head>	
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="login-page">
		  <div class="form">
		    <form action="confirmationAccountCreator.php" method="POST" class="login-form">
		      <input type="text" name="username" placeholder="username"/>
		      <input type="password" name="password" placeholder="password"></br>
		      <input type="text" name="name" placeholder="name"/>
		      <input type="text" name="email" placeholder="email"/></br>
		      <select name="typeAccount">
			<option value='1'>Teacher</option>      
			<option value='2'>Student</option>      
			<option value='3'>Socially</option>      
			<option value='4'>Work</option>      			      
		      </select></br>
		      <button><span>Sign Up</span></button>
		    </form>
		  </div>
		</div>
	</body>
</html>
