<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="collapse navbar-collapse">  
      <ul class="nav navbar-nav">
      <?php 
        echo '
        <li><a style="color: white;" href="/kasir/home.php">Menu &nbsp;<i class="fas fa-bars"></i></a></li>
        <li class="active"><a style="color: white;" href="menu_kasir.php">Transaksi</a></li>';
      
      ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color: white;" href="/kasir/destroy.php">Keluar &nbsp;<i class="fas fa-sign-out-alt"></i></a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>