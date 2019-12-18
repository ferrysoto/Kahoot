 <div class="row">
   <div class="col-md-12">
     <div class="row">
       <div class="col-md-3" style="padding-right: 0;">
         <ul class="list-group list-group-flush">
          <li class="list-group-item-primary list-group-item d-flex justify-content-between align-items-center">
            Kahoots Created
            <span class="badge badge-primary badge-pill">
            <?php 
            $count=countRow('*','quiz',"id_creator=".$_SESSION['id_creator']);
            echo $count[0];
             ?>
          </span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Plays of your Kahoots
            <span class="badge badge-secondary badge-pill">
            <?php 
            $count=countRow('*','room',"id_creator=".$_SESSION['id_creator']);
            echo $count[0];
             ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Total Players
            <span class="badge badge-secondary badge-pill">$countPlayers</span>
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
               $pdo = new PDO("mysql:host=localhost; dbname=kahoot", "root", "");
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
        <h5 class="modal-title" id="newQuizLabel">Create new Kahoot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Example multiple select</label>
            <select multiple class="form-control" id="exampleFormControlSelect2">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
          </div>
        </form>      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Done!</button>
      </div>
    </div>
  </div>
</div>
