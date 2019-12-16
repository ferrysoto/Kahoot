      <div class="card-header d-flex justify-content-between">
        My Kahoots!
        <button type="button" class="btn btn-light" name="addKahoot" style="padding: 0 0.75rem;" data-toggle="modal" data-target="#addQuiz">+</button>
      </div>
      <div class="list-group list-group-flush">
        <button type="button" class="list-group-item list-group-item-action">Test1</button>
        <button type="button" class="list-group-item list-group-item-action">Test2</button>
        <button type="button" class="list-group-item list-group-item-action">Test3</button>
        <button type="button" class="list-group-item list-group-item-action">Test4</button>
        <button type="button" class="list-group-item list-group-item-action">Test5</button>
        <button type="button" class="list-group-item list-group-item-action">Test6</button>
        <button type="button" class="list-group-item list-group-item-action">Test7</button>
        <button type="button" class="list-group-item list-group-item-action">Test8</button>
        <button type="button" class="list-group-item list-group-item-action">Test9</button>
        <button type="button" class="list-group-item list-group-item-action">Test10</button>
      </div>

      <div class="col-md-12">
        <!-- Modal Log in-->
        <div class="modal fade" id="addQuiz" tabindex="-1" role="dialog" aria-labelledby="addQuiz" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="login"><b>Create Kahoot!</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-md-12">
                  <div class="form">
                    <form action="./resources/views/checkLogin.php" method="post" class="login-form">
                      <div class="container-fluid">
                      	<div class="row">
                      		<div class="col-md-7">
                            <div class="form-group">
                              <label for="quiz-title">Title</label>
                              <input type="text" class="form-control" id="quiz-title" placeholder="Enter Kahoot title..." required>
                            </div>
                            <div class="form-group">
                              <label for="quiz-description">Description</label>
                              <label class="form-check-label" for="quiz-description">(optional)</label>
                              <textarea class="form-control" id="quiz-description" rows="5"></textarea>
                            </div>
                      		</div>
                      		<div class="col-md-5">
                            <div class="form-group">
                              <div class="input-group">
                                <div class="card" style="width: 18rem;">
                                  <img class="card-img-top" src="/resources/img/cover.jpg" alt="Quiz cover default">
                                  <div class="card-body" style="padding-bottom: 5px;">
                                    <h5 class="card-title">Cover image</h5>
                                  </div>
                                </div>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="quiz-cover">
                                  <label class="custom-file-label" for="quiz-cover">Choose file</label>
                                </div>
                              </div>
                            </div>
                      		</div>
                      	</div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="text-muted justify-content-start">
                  Step 1
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Done</button>
              </div>
            </div>
          </div>
        </div>
      </div>
