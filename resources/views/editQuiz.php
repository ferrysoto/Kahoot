<?php include 'layout-base.php';?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" style="background-color: white">
          <div class="row" tabindex="0">
            <div class="row d-flex justify-content-around">
              <b>1. Question</b>
              <img src="../img/cover.png" alt="Question cover" width="80%" height="auto">
            </div>
          </div>
          <hr>

          <div class="row" tabindex="2">
            <div class="row d-flex justify-content-around">
              <b>2. Question</b>
              <img src="../img/cover.png" alt="Question cover" width="80%" height="auto">
            </div>
          </div>
          <hr>

          <div class="row" tabindex="2">
            <div class="row d-flex justify-content-around">
              <b>3. Question</b>
              <img src="../img/cover.png" alt="Question cover" width="80%" height="auto">
            </div>
          </div>
          <div class="row d-flex justify-content-around" tabindex="0">
            <div class="btn-group dropright">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Add question
              </button>
              <div class="dropdown-menu" style="background-color: #f1f1f1">
                <a class="dropdown-item" href="#" style="color: #e11c3c">Quiz</a>
                <a class="dropdown-item" href="#" style="color: #1368ce">True or false</a>
                <a class="dropdown-item" href="#" style="color: #ffa602">Multiple Choice</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" style="color: #26890c">Velocity</a>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-10" style="background-color: #f2f2f2;">
          <div class="md-form">
            <input placeholder="Click to start typing your question" type="text" id="inputPrefilledEx" class="form-control input-title">
          </div>
          <div class="col-md-2">

          </div>
          <div class="col-md-8">
            <div class="image-upload">
              <label for="file-input">
                <img src="../img/cover-image.png" alt ="Click to select image" title ="Click to select image">
                <input id="file-input" type="file"/>
              </label>
            </div>
          </div>
          <!-- Material input -->
        </div>
    </div>
</div>
