<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../views/downloadFile.php">Home</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../views/uploadFileView.php">Envoyer</a>       
        </li> 
        <li class="nav-item">  <a class="nav-link active" aria-current="page" style="margin-left: 700px;"> <?= $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>  
          </a>        
        </li>  
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../logiques/logout.php" style="margin-left: 50px">Deconnexion</a>       
        </li>     
      </ul>
    
    </div>
  </div>
</nav>