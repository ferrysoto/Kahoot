<?php include 'layout-base.php'; include '../helps/actionsDatabase.php'; ?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="../../index.php"><img style="max-height: 5vh;filter: brightness(100);" src="../img/logo.png"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarText">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <!-- <a class="nav-link" href="dashboard.php">Home<span class="sr-only">(current)</span></a> -->
	      </li>
	    </ul>
	    <span class="navbar-text">
	    <?php
   			$dirs = array_filter(glob('../img/imatges_perfil/*'), 'is_file');
			$srcImg="";
			foreach ($dirs as $key => $value) {
				if(strpos($value, $_SESSION['id_creator']) != false){
				$srcImg=$value;
				}
			}
			if (empty($srcImg)) {
				$srcImg='../img/imatges_perfil/default.png';
			}

	     	echo "<img class='mr-2' style='max-height: 5vh;' src='".$srcImg."''>";
	       	echo $_SESSION['nameCreator'];
	    ?>
	    </span>
	  </div>
	</nav>
	<?php
    include 'dashboard-content.php';
	 ?>

  </body>
</html>
