<?php
        session_start();
        if(isset($_SESSION['verified_user_id']))
        {
            $_SESSION['status']="You are already Logged in";
            header('Location:index.php');
            exit();
        }
        include('includes/header.php');
    ?>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <style>
       .password-container {
           /*width: 400px;*/
           position: relative;
        }

       .password-container input[type="password"]
       {
           width: 100%;
           border-color: #36454F;
       }

       .fa-eye {
           position: relative;
           cursor: pointer;
           color: gray;
       }

       .fa-eye:after {
           position: relative;
           cursor: pointer;
           color: gray;
       }

       .card-reader h4 {
           text-align: center;
       }
   </style>
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-sm-6"> <?php
                if (isset($_SESSION['status'])) {
                    echo "<h5 class='alert alert-success'>" . $_SESSION['status'] . "</h5>";
                    unset($_SESSION['status']);
                }
                ?> <div class="card">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-sm-6">
                               <div class="form-group mb-3">
                                   <h5 style="color:#36454F">Log Masuk Pengguna</h5>
                               </div>
                               <form action="logincode.php" method="POST" onsubmit="return validateForm()">
                                   <div class="form-group mb-3">
                                       <label for="email" style="font-size: 12px">EMAIL:</label>
                                       <input style="border-color:#36454F" id="email" type="email" name="email" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                       <label for="password" style="font-size: 12px">KATA LALUAN:</label>
                                       <div class="password-container">
                                           <input id="password" type="password" name="password" class="form-control">
                                           <i class="fa-solid fa-eye" id="eye"></i>
                                       </div>
                                   </div>
                                   <div class="form-group mb-3">
                               <button style="font-style:bold" type="submit" name="login_btn" class="btn btn-primary">Login</button>
                           </div>
                               </form>
                           </div>

                           <div class="col-sm-6">
                               <div>
                                   <h5 style="color:#36454F">Makluman</h5>
                               </div>
                               <div>
                                   <br>
                                   <p style="color:#36454F">Sistem penfailan surat bertujuan untuk merekodkan makllumat keluar masuk surat</p>
                               </div>
                           </div>
                           
                       </div>
                   </div>
               </div>
           </div>
           <script>
               const passwordInput = document.querySelector("#password");
               const eye = document.querySelector("#eye");
               eye.addEventListener("click", togglePasswordVisibility);

               function togglePasswordVisibility() {
                   if (passwordInput.type === "password") {
                       passwordInput.type = "text";
                       eye.classList.remove("fa-eye");
                       eye.classList.add("fa-eye-slash");
                   } else {
                       passwordInput.type = "password";
                       eye.classList.remove("fa-eye-slash");
                       eye.classList.add("fa-eye");
                   }
               }

               function validateForm() {
                   var email = document.querySelector('input[name="email"]').value;
                   var password = document.querySelector('input[name="password"]').value;
                   if (email === '' && password === '') {
                       alert('Please enter your email and password.');
                       return false;
                   } else if (email === '') {
                       alert('Please enter your email address.');
                       return false;
                   } else if (password === '') {
                       alert('Please enter your password.');
                       return false;
                   }
                   return true; // Continue with form submission if everything is valid
               }
           </script> <?php
    include('includes/footer.php');
    ?>