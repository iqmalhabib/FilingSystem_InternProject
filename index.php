<?php
    include('authentication.php');
    include('includes/header.php');
?>
<style>
    .box {
        display:relative;
        align-items:center;
        justify-content:center;
        border: 1px solid #CF9FFF;
        padding: 20px;
        text-align: center;
        background-color: #E0B0FF;
        transition: background-color 0.3s ease;
        margin: 10px; /* Add margin to create a gap between boxes */
        height:120px;
        transition: transform .2s;
        color: #333; /* Set the default text color */
    }

    .box:hover {
        
        transform: scale(1.2);
        color: #FFA500;
    }
    .col-md-4 a {
    text-decoration: none; /* Remove underline from the links */
    }
    .box h2 {
        font-size: 20px;
    }
    

</style>

<div class="container">
<div class="row">
            <div class="col-sm-6">
                
                    <?php
                    if(isset($_SESSION['status']))
                    {
                        echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                        unset($_SESSION['status']);
                    }
                    ?>

                 
            </div>
            <h2 style="font-family:sans-serif;text-align:center">Selamat Datang Ke Sistem Penfailan</h2>
        </div>
    <div class="row">
        <div class="col-md-4">
            <a href="index100.php">
                <div class="box">
                    <h2>Index 100</h2>
                    <h2>Pengurusan Pentadbiran</h2>
                    <!-- Add any content or styling for the box here -->
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="index200.php">
                <div class="box">
                <h2>Index 200</h2>
                    <h2>Pengurusan Tanah, Bangunan dan Infrastruktur</h2>
                    <!-- Add any content or styling for the box here -->
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="index300.php">
                <div class="box">
                <h2>Index 300</h2>
                    <h2>Aset Alih,Hidup dan Stor Kerajaan</h2>
                    <!-- Add any content or styling for the box here -->
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="index400.php">
                <div class="box">
                <h2>Index 400</h2>
                    <h2>Kewangan</h2>
                    <!-- Add any content or styling for the box here -->
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="index500.php">
                <div class="box">
                <h2>Index 500</h2>
                    <h2>Sumber Manusia</h2>
                    <!-- Add any content or styling for the box here -->
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="index600.php">
                <div class="box">
                <h2>Index 600</h2>
                    <h2>Pengurusan Aktiviti</h2>
                    <!-- Add any content or styling for the box here -->
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="index700.php">
                <div class="box">
                <h2>Index 700</h2>
                    <h2>Hal Ehwal Akademik</h2>
                    <!-- Add any content or styling for the box here -->
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="index800.php">
                <div class="box">
                <h2>Index 800</h2>
                    <h2>Hal Ehwal Pelajar</h2>
                    <!-- Add any content or styling for the box here -->
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="index900.php">
                <div class="box">
                <h2>Index 900</h2>
                    <h2>Penyelidikan</h2>
                    <!-- Add any content or styling for the box here -->
                </div>
            </a>
        </div>
    </div>
</div>

<?php
    include('includes/footer.php');
?>
