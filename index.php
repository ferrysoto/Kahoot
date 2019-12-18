<!DOCTYPE html>
<?php session_start(); ?>
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
        <a href="./">
          <img src="./resources/img/logo.png" alt="Logo Kahoot" width="100px" height="auto" style="filter: brightness(100);">
        </a>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item active" style="margin-right: 10px;">
          <a href="resources/views/enterPin.php" class="nav-link" role="button" aria-pressed="true">Enter PIN Game</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-success" href="#" data-toggle="modal" data-target="#signUpModal">Sing Up! - It's free</a>
        </li>
        <li class="nav-item active">
          <a href="#" role="button" class="nav-link" data-toggle="modal" data-target="#loginUpModal">Log in</a>
        </li>
      </ul>
    </nav>

      <div class="slider_area">
          <div class="single_slider  d-flex align-items-center slider_bg_1">
              <div class="container">
                  <div class="row align-items-center">
                      <div class="col-xl-7 col-md-6">
                          <div class="slider_text ">
                              <h3 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s" >Make learning awesome! <br>
                                  with Kahoot!</h3>
                              <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">Kahoot! brings engagement and fun to more than 1 billion players every year at school, at work, and at home</p>
                              <div class="video_service_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">
                                  <a href="#" data-toggle="modal" data-target="#signUpModal" class="boxed-btn3"> <b>Sing up for free!</b></a>
                              </div>
                          </div>
                      </div>
                      <div id="video-bg">
                        <img src="./resources/img/phone.png" alt="phone-template">
                      </div>
                      <div id="video-home">
                        <video width="305" height="700" src="./resources/video/home-mobile.mp4" autobuffer="" autoplay="" muted="" loop="" webkit-playsinline="true" playsinline="true">
                          <div class="fallback">
                            <img src="./resources/img/phone.png" alt="mobile" width="700" height="auto">
                          </div>
                        </video>
                      </div>
                  </div>
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
                    <input type="text" class="form-control" name="nameUser" id="username" aria-describedby="name" placeholder="Username" maxlength="75" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                  </div>
                  <button type="submit" name="button" class="btn btn-primary justify-content-end">Log in</button>
                  <p class="message">Not registered? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signUpModal">Create an account now!</a></p>
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
                <form action="./resources/views/AccountValidator.php" method="post" class="login-form" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="nameUser" aria-describedby="name" placeholder="Username" maxlength="75" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="nameUser">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" required>
                  </div>
                  <div class="form-group">
                    <label for="role">Role</label>
                    <select class="custom-select" name="typeAccount">
                      <option value="1" selected>Teacher</option>
                      <option value="2" disabled>Student</option>
                      <option value="3" disabled>Socially</option>
                      <option value="4" disabled>Work</option>
                    </select>
                  </div>
                   <div class="form-group">
                      <label for="profileImage">Profile Image</label>
                      <input type="file" class="form-control-file" accept=".png, .jpg, .jpeg, .gif" name="profileImage" id="profileImage">
                  </div>
                  <button type="submit" name="button" class="btn btn-primary justify-content-end">Sign in</button>
                  <p class="message">Are you registered? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginUpModal">Log in now!</a></p>
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
