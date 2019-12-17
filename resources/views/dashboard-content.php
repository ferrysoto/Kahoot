 <div class="row">
   <div class="col-md-12">
     <div class="row">
       <div class="col-md-3" style="padding-right: 0;">
         <ul class="list-group list-group-flush">
          <li class="list-group-item-primary list-group-item d-flex justify-content-between align-items-center">
            Kahoots Created
            <span class="badge badge-primary badge-pill">$countKahoots</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Plays of your Kahoots
            <span class="badge badge-secondary badge-pill">$countKahootsPlayed</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Total Players
            <span class="badge badge-secondary badge-pill">$countPlayers</span>
          </li>
          <li>
            <button type="button" class="list-group-item list-group-item-action active">Create new Kahoot</button>
          </li>
          <li>
            <button type="button" class="list-group-item list-group-item-action">My account</button>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <a class="list-group-item-action disabled" href="logout.php">Log Out</a>
          </li>
        </ul>
       </div>
       <div class="col-md-9" style="padding-left: 0;">
         <div class="row">
           <div class="col-md-12">
             <div class="jumbotron" style="background-color: white;">
               <h1 class="display-4">My Kahoots</h1>
               <hr class="my-4">
               <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
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
