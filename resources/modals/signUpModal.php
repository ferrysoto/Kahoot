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
            <form action="./resources/views/AccountValidator.php" method="post" class="login-form">
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
              <button type="submit" name="button" class="btn btn-primary justify-content-end">Sign in</button>
              <p class="message">Are registered? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginUpModal">Log in now!</a></p>
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
