<?php include 'layout-base.php';?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" style="background-color: white; margin-top: 15px;">
          <div class="row" tabindex="1">
            <div class="row d-flex justify-content-around" id="questionOptions">
              <b>1. Question</b>
              <div class="dropright">
                <div data-toggle="dropdown">
                  <img class="align-question-img" src="../img/cover.png" alt="Question cover" width="80%" height="auto">
                </div>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Edit</a>
                  <a class="dropdown-item" href="#">Change position</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" style="color: #e11c3c" href="#">Remove</a>
                </div>
              </div>
            </div>
          </div>
          <hr>

          <div class="row" tabindex="2">
            <div class="row d-flex justify-content-around" id="questionOptions">
              <b>2. Question</b>
              <div class="dropright">
                <div data-toggle="dropdown">
                  <img class="align-question-img" src="../img/cover.png" alt="Question cover" width="80%" height="auto">
                </div>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Edit</a>
                  <a class="dropdown-item" href="#">Change position</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" style="color: #e11c3c" href="#">Remove</a>
                </div>
              </div>
            </div>
          </div>
          <hr>

          <div class="row" tabindex="3">
            <div class="row d-flex justify-content-around" id="questionOptions">
              <b>3. Question</b>
              <div class="dropright">
                <div data-toggle="dropdown">
                  <img class="align-question-img" src="../img/cover.png" alt="Question cover" width="80%" height="auto">
                </div>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Edit</a>
                  <a class="dropdown-item" href="#">Change position</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" style="color: #e11c3c" href="#">Remove</a>
                </div>
              </div>
            </div>
          </div>
          <hr>

          <div class="row d-flex justify-content-around" tabindex="0" style="margin-top: 15px;">
            <div class="btn-group dropright">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Add question
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#" style="color: #e11c3c">Quiz</a>
                <a class="dropdown-item" href="#" style="color: #1368ce">True or false</a>
                <a class="dropdown-item" href="#" style="color: #ffa602">Multiple Choice</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" style="color: #26890c" disabled>Velocity</a>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-10" style="background-color: #f2f2f2;">
          <div class="md-form" style="margin-bottom: 15px;">
            <input placeholder="Click to start typing your question" type="text" id="inputPrefilledEx" class="form-control input-title">
          </div>
          <div class="container-fluid">
          	<div class="row">
          		<div class="col-md-2">
                <button type="button" class="btn btn-secondary btn-circle btn-xl">20 Sec.</button>
                <div class="slidecontainer">
                  <input type="range" min="100" max="2000" value="1000" class="slider" id="myRange">
                  <p>Points: <span id="points"></span></p>
                </div>
                <script>
                var slider = document.getElementById("myRange");
                var output = document.getElementById("points");
                output.innerHTML = slider.value;
                slider.oninput = function() {
                  output.innerHTML = this.value;
                }
                </script>
          		</div>
          		<div class="col-md-10">
                <div class="image-upload">
                  <label for="file-input">
                    <img class="img-fluid"  height="1920" width="1080" src="../img/cover-image.png" alt ="Click to select image" title ="Click to select image">
                    <input id="file-input" type="file"/>
                  </label>
                </div>
          		</div>
              <div class="container-fluid">
              	<div class="row">
              		<div class="col-md-12">
              			<div class="row">
              				<div class="col-md-6">
              					<div class="btn-group btn-group-lg" role="group">
                          <div class="md-form" style="margin-bottom: 15px;">
                            <input placeholder="Answer 1" type="text" id="inputPrefilledEx" class="form-control input-title">
                          </div>
              					</div>
              				</div>
              				<div class="col-md-6">
              					<div class="btn-group" role="group">
                          <div class="md-form" style="margin-bottom: 15px;">
                            <input placeholder="Answer 2" type="text" id="inputPrefilledEx" class="form-control input-title">
                          </div>
              					</div>
              				</div>
              			</div>
              			<div class="row">
              				<div class="col-md-6">
              					<div class="btn-group" role="group">
                          <div class="md-form" style="margin-bottom: 15px;">
                            <input placeholder="Answer 3" type="text" id="inputPrefilledEx" class="form-control input-title">
                          </div>
              					</div>
              				</div>
              				<div class="col-md-6">
              					<div class="btn-group" role="group">
                          <div class="md-form" style="margin-bottom: 15px;">
                            <input placeholder="Answer 4" type="text" id="inputPrefilledEx" class="form-control input-title">
                          </div>
              					</div>
              				</div>
              			</div>
              		</div>

                  

              	</div>
              </div>
          	</div>
          </div>
        </div>
    </div>
</div>
