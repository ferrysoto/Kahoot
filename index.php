<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/main.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Kahoot</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-between">
      <ul class="navbar-nav">
        <img src="./resources/logo.png" alt="Logo Kahoot" width="100px" height="auto" style="filter: brightness(100);">
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item active" style="margin-right: 10px;">
          <a href="#" class="nav-link" role="button" aria-pressed="true">Enter PIN Game</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-success" href="#" data-toggle="modal" data-target="#signUpModal">Sing Up! - It's free</a>
        </li>
        <li class="nav-item active">
          <a href="#" role="button" class="nav-link" data-toggle="modal" data-target="#loginUpModal">Log in</a>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-6">
    			<div class="custom-jumbotron">
    				<h2>
    					Hello, world!
    				</h2>
    				<p>
    					This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
    				</p>
    				<p>
    					<a class="btn btn-primary btn-large" href="#">Learn more</a>
    				</p>
    			</div>
    		</div>
    		<div class="col-md-6">
          <video width="100%" height="100%" autoplay muted controls id="home-video">
            <source src="./resources/video/home.mp4" type="video/mp4">
              Your browser does not support the video tag.
          </video>
    		</div>
    	</div>
    </div>






    <div class="col-md-12">
      <!-- Modal Log in-->
      <div class="modal fade" id="loginUpModal" tabindex="-1" role="dialloginUpModalog" aria-labelledby="loginUpModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="login">Log in Kahoot</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form">
                <form action="./resources/views/checkLogin.php" method="post" class="login-form">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="name" placeholder="Username" maxlength="75" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                  </div>
                  <button type="submit" name="button" class="btn btn-primary justify-content-end">Log in</button>
                  <p class="message">Not registered? <a href="#">Create an account now!</a></p>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <!-- Modal Sign in-->
      <div class="modal fade" id="signUpModal" tabindex="-1" role="dialsignUpModalog" aria-labelledby="signUpModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="singin">Sign in Kahoot</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form">
                <form action="./resources/views/confirmationAccountCreator.php" method="post" class="login-form">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="name" placeholder="Username" maxlength="75" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="nameUser">Name</label>
                    <input type="text" class="form-control" id="nameUser" name="nameUser" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                  </div>
                  <div class="form-group">
                    <label for="role">Role</label>
                    <select class="custom-select" name="role">
                      <option value="1">Professor</option>
                    </select>
                  </div>
                  <button type="submit" name="button" class="btn btn-primary justify-content-end">Log in</button>
                  <p class="message">Not registered? <a href="#">Create an account now!</a></p>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
