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
