<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./public/css/main.css">
    <link rel="stylesheet" href="./public/css/bootstrap.css">
    <script type="text/javascript" src="./public/js/bootstrap.js"></script>
    <script type="text/javascript" src="./public/js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="./public/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Kahoot</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a href="#" role="button" class="btn btn-outline-light" data-toggle="modal" data-target="#loginUpModal">Log in</a>
        </li>
        <li class="nav-item">
          <a href="#" class="btn btn-outline-success" role="button" aria-pressed="true">Enter PIN Game</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
      </ul>
    </nav>
    <div class="col-md-12">
      <!-- Modal -->
      <div class="modal fade" id="loginUpModal" tabindex="-1" role="dialloginUpModalog" aria-labelledby="loginUpModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Log in Kahoot</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form">
                <form action="./resources/views/checkLogin.php" method="post" class="login-form">
                  <input type="text" name="user" placeholder="username"/>
                  <input type="password" name="password" placeholder="password"/>
                  <button type="submit" name="button" class="btn btn-primary">Log in</button>
                  <p class="message">Not registered? <a href="#">Create an account now!</a></p>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" >Log in</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
