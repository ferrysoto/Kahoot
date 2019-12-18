<div class="modal fade bd-example-modal-lg" id="edit-quiz" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-full-width">
    <div class="modal-content modal-full-width">
      <div class="modal-header">
        <h5 class="modal-title">Edit Kahoot {{name-kahoot}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <ul class="list-group">
                <li class="list-group-item">Question 1</li>
                <li class="list-group-item">Question 2</li>
                <li class="list-group-item">Question 3</li>
                <li class="list-group-item">Question 4</li>
                <li class="list-group-item">Question 5</li>
              </ul>
            </div>
            <div class="col-md-9">
              <div class="page-header">
                <h1>
                  Question 1 <small>Kahoot 1</small>
                </h1>
              </div>
              <div class="form-group">
                <label for="type-question">Choose type question</label>
                <select class="form-control" id="type-question">
                  <option>Four answers, one correct</option>
                  <option>Multiple Choice</option>
                  <option>True or false</option>
                  <option>Velocity</option>
                  <option selected disabled>Select Option</option>
                </select>
              </div>
              <div class="form-group">
                <label for="question-add-text">Write your first question bro!</label>
                <input type="text" class="form-control" id="question-add-text" placeholder="Start typing your question" maxlength="255">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="form-control-file" id="question-image-quiz">
                  <label class="custom-file-label" for="question-image-quiz">Choose file</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Add question</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>
