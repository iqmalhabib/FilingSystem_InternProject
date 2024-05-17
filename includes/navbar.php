  <?php
  $currentPage = basename($_SERVER['PHP_SELF']);
  ?>
  <style>
    .logo {
      width: 110px; /* Adjust the width to your desired size */
      height: auto; /* Maintain the aspect ratio */

    }
    .logo1 {
      width: 250px; /* Adjust the width to your desired size */
      height: auto; /* Maintain the aspect ratio */
      
    }
    .navbar {
      display: flex;
        align-items: center;
        border-bottom: 1px solid #000; /* Add a 1px solid black bottom border */
        height: 13vh;
    }
    .nav-link {
      position: relative;
      display: block;
      text-transform: uppercase;
      margin: 20px 0;
      padding: 10px 20px;
      text-decoration: none;
      color: #262626;
      font-family: sans-serif;
      font-size: 15x;
      font-weight: 600;
      transition: 0.5s;
      z-index: 1;
    } 
    .nav-link:before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border-top: 2px solid #402c74;
      border-bottom: 2px solid #402c74;
      transform: scaleY(2);
      opacity: 0;
      transition: 0.3s;
    }
    
    .nav-link:after {
      content: '';
      position: absolute;
      top: 2px;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #402c74;
      transform: scale(0);
      opacity: 0;
      transition: 0.3s;
      z-index: -1;
    }

    .nav-link:hover {
      color: #fff;
    }

    .nav-link:hover:before {
      transform: scaleY(1);
      opacity: 1;
    }

    .nav-link:hover:after {
      transform: scaleY(1);
      opacity: 1;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }
    .dropdown-content a {
      float: none;
      color: black;
      padding: 6px 8px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #402c74; 
      color: #fff;
    }
    
    .dropdown:hover .dropdown-content {
      display: block;
    }
    /* Add this style to highlight the active link */
  
  
</style>


  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">

      <a class="navbar-brand" href="home.php">
        <img src="gambar/LOGO_MITRANS.jpg" alt="Logo Mitrans" class="logo1">
      </a>
      <a class="navbar-brand" href="home.php">
        <img src="gambar/logonobg.png" alt="Logo Mitrans" class="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <?php if (!isset($_SESSION['verified_user_id'])) : ?>
    <li class="nav-item <?php echo ($currentPage == 'register.php') ? 'active' : ''; ?>">
      <a class="nav-link" href="register.php">Daftar</a>
    </li>
    <li class="nav-item <?php echo ($currentPage == 'login.php') ? 'active' : ''; ?>">
      <a class="nav-link" href="login.php">Log Masuk</a>
    </li>
          <?php else : ?>
            <li class="nav-item dropdown">
            <a class="nav-link dropbtn" href="index.php">Dashboard <i class="fa fa-caret-down"></i></a>
            <div class="dropdown-content">
              <a href="index100.php">Pengurusan Pentadbiran</a>
              <a href="index200.php">Pengurusan Tanah, Bangunan dan Infrastruktur</a>
              <a href="index300.php">Aset Alih,Hidup dan Stor Kerajaan</a>
              <a href="index400.php">Kewangan</a>
              <a href="index500.php">Sumber Manusia</a>
              <a href="index600.php">Pengurusan Aktiviti</a>
              <a href="index700.php">Hal Ehwal Akademik</a>
              <a href="index800.php">Hal Ehwal Pelajar</a>
              <a href="index900.php">Penyelidikan</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="report.php">Laporan</a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Keluar</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
