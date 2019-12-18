 <div class="row">
   <div class="col-md-12">
     <div class="row">
       <div class="col-md-3" style="padding-right: 0;">
         <ul class="list-group list-group-flush">
          <li class="list-group-item-primary list-group-item d-flex justify-content-between align-items-center">
            Kahoots Created
            <span class="badge badge-primary badge-pill">
            <?php 
            $count=countRow('quiz',"id_creator=".$_SESSION['id_creator']);
            echo $count[0];
             ?>
          </span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Plays of your Kahoots
            <span class="badge badge-secondary badge-pill">
            <?php 
            $count=countRow('room',"id_creator=".$_SESSION['id_creator']);
            echo $count[0];
             ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Total Players
            <span class="badge badge-secondary badge-pill">
            <?php 
            $count=countRow('players',"id_room in (SELECT id_room from room where id_creator =".$_SESSION['id_creator'].")");
            echo $count[0];
             ?></span>
          </li>
          <li>
            <a type="button" data-toggle="modal" data-target="#newQuiz" class="list-group-item list-group-item-action active">Create new Kahoot</a>
          </li>
          <li>
            <button type="button" class="list-group-item list-group-item-action">My account</button>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <a type="button" class="list-group-item-action disabled" href="logout.php">Log Out</a>
          </li>
        </ul>
       </div>
       <div class="col-md-9" style="padding-left: 0;">
         <div class="row">
           <div class="col-md-12">
             <div class="jumbotron" style="background-color: white;">
               <h1 class="display-4">My Kahoots</h1>
               <hr class="my-4">
               <?php
               $pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "P@ssw0rd");
               $query = $pdo->prepare("SELECT * FROM quiz where id_creator = ".  $_SESSION['id_creator'] .";" );
               $query->execute();
               $quizs = $query->fetchAll();
               if(!$quizs){
                 echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Holy guacamole!</strong> You dont have any quiz<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
               }else{
                 echo "<table class='table table-responsive-sm mt-5 mx-auto'><thead><tr><th class='text-center' scope='col'>Name Quiz</th><th scope='col' class='text-center'>Options</th></tr></thead><tbody>";


                 foreach ($quizs as $quiz) {
                   echo '<tr>' .
                   '<td class="align-middle">'.$quiz['name'].'</td>' .
                   '<td class="align-middle"><div class="btn-group d-flex justify-content-center" role="group" aria-label="First group">' .

                   '<a href="dashboard.php?play='.$quiz['id_quiz'].'" role="button" class="btn btn-primary " name="button" >Play</a>'.
                   '<a href="dashboard.php?edit='.$quiz['id_quiz'].'" role="button" class="btn btn-success" name="button">Edit</a>'.
                   '<a href="dashboard.php?delete='.$quiz['id_quiz'].'" role="button" class="btn btn-danger" name="button">Delete</a>'.

                   '</div></td></tr>';
                 }
                 echo "</tbody></table>";
               }
               ?>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>

 <!-- Modal -->
<div class="modal fade" id="newQuiz" tabindex="-1" role="dialog" aria-labelledby="newQuizLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newQuizLabel"><b>Create new Kahoot</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <form>
            <div class="col-md-6" style="float: left;">
              <div class="form-group">
                <label for="title-quiz"><b>Title</b></label>
                <input type="text" class="form-control" id="title-quiz" placeholder="Enter Kahoot title...">
              </div>
              <div class="form-group">
                <label for="description-quiz"><b>Description</b></label>
                <textarea class="form-control" id="description-quiz" rows="5" placeholder="Optional"></textarea>
              </div>
            </div>
            <div class="col-md-6" style="float: right;">
              <label for="cover-image-quiz"><b>Cover image</b></label>
              <img class="card-img-top" src="../img/cover.png" alt="cover input" for="cover-image-quiz">
              <div class="card-body">
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" class="form-control-file" id="cover-image-quiz">
                    <label class="custom-file-label" for="cover-image-quiz">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Done!</button>
      </div>
    </div>
  </div>
</div>
