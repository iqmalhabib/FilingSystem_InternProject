<?php
    include('authentication.php');
    include('includes/header.php');    
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Kemas Kini Data<a href="index100.php"class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <?php
                        include('dbcon.php');
                        if(isset($_GET['id']))
                        {
                            $key_child = $_GET['id'];
                            $ref_table='index100';
                            $getdata = $database->getReference($ref_table)->getChild($key_child)->getValue();
                           
                            if($getdata>0)
                            {
                                ?>                             
                        <form action="code.php" method="POST">     
                            <input type="hidden" name="key"value="<?=$key_child;?>">
                            <div class="row">
                            <div class="col-md-12">
                            <div class="form-group mb-3">
                                <strong>Pilih Surat Masuk/Keluar</strong><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="letterType" id="masuk" value="masuk" <?php if ($getdata['letterType'] == 'masuk') echo 'checked'; ?> onchange="changeContent()">
                                    <label class="form-check-label" for="masuk">Surat Masuk</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="letterType" id="keluar" value="keluar" <?php if ($getdata['letterType'] == 'keluar') echo 'checked'; ?> onchange="changeContent()">
                                    <label class="form-check-label" for="keluar">Surat Keluar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                   <div class="form-group mb-3">
                                       <label for="first_name"><strong>No. Rujukan</strong></label>
                                       <input type="text" name="no_rujukan" value="<?=$getdata['no_rujukan'];?>" id="no_rujukan" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                       <label for="tarikh"><strong>Tarikh Surat</strong></label>
                                       <input type="date" name="surat_date" value="<?=$getdata['surat_date'];?>" id="surat_date" class="form-control">
                                   </div>
                                   <div class="form-group mb-3" id="content">
                                       <label id="receiverDate"><strong>Tarikh Surat Terima/Dikeluarkan:</strong></label>
                                       <input type="date" name="surat_io" value="<?=$getdata['surat_io'];?>" id="surat_io" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                       <label for="perkara"><strong>Perkara</strong></label>
                                       <input type="text" name="perkara" value="<?=$getdata['perkara'];?>" id="perkara" class="form-control">
                                   </div>
                                   <div class="form-group mb-3" id="content">
                                       <label id="receiverText"><strong>Nama Pengirim/Penerima:</strong></label>
                                       <input type="text" name="first_name" value="<?=$getdata['first_name'];?>" id="first_name" class="form-control">
                                   </div>
                                   <div class="form-group mb-3" id="content">
                                       <label id="receiverAddress"><strong>Alamat Pengirim/Penerima:</strong></label>
                                       <input type="text" name="address" value="<?=$getdata['address'];?>" id="address" class="form-control">
                                   </div>
                                   <div class="form-group mb-3" id="content">
                                       <label id="receiverPhone"><strong>No. Telefon Pengirim/Penerima:</strong></label>
                                       <input type="tel" name="phone" value="<?=$getdata['phone'];?>" id="phone" class="form-control" placeholder="+60-123456789" pattern="[0-9]{2}-[0-9]{9}" required>
                                   </div>
                                   <div class="form-group mb-3" id="content">
                                       <label id="receiverEmail" for="email"><strong>No. Fax / Email</strong></label>
                                       <input type="email" name="email" value="<?=$getdata['email'];?>" id="email" class="form-control">
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <!-- Second column -->
                                   <div class="form-group mb-3">
                                       <label for="peringkat"><strong>Dokumen Terperingkat</strong></label>
                                       <select name="peringkat" id="peringkat" class="form-control">
                                            <option value="Terhad" <?php if ($getdata['peringkat'] == 'Terhad') echo 'selected'; ?>>Terhad</option>
                                            <option value="Sulit" <?php if ($getdata['peringkat'] == 'Sulit') echo 'selected'; ?>>Sulit</option>
                                            <option value="Rahsia" <?php if ($getdata['peringkat'] == 'Rahsia') echo 'selected'; ?>>Rahsia</option>
                                            <option value="Rahsia besar" <?php if ($getdata['peringkat'] == 'Rahsia besar') echo 'selected'; ?>>Rahsia besar</option>
                                            <!-- Add more options as needed -->
                                        </select>

                                   </div>
                                   <div class="form-group mb-3">
                                       <label for="jenis"><strong>Jenis Surat</strong></label>
                                       <select name="jenis" id="jenis" class="form-control">
                                            <option value="Surat rasmi" <?php if ($getdata['jenis'] == 'Surat rasmi') echo 'selected'; ?>>Surat rasmi</option>
                                            <option value="Emel rasmi" <?php if ($getdata['jenis'] == 'Emel rasmi') echo 'selected'; ?>>Emel rasmi</option>
                                            <option value="GRN" <?php if ($getdata['jenis'] == 'GRN') echo 'selected'; ?>>GRN</option>
                                            <option value="LO" <?php if ($getdata['jenis'] == 'LO') echo 'selected'; ?>>LO</option>
                                            <option value="Pekeliling" <?php if ($getdata['jenis'] == 'Pekeliling') echo 'selected'; ?>>Pekeliling</option>
                                            <!-- Add more options as needed -->
                                        </select>

                                   </div>
                                   <div class="form-group mb-3">
                                       <label for="kiriman"><strong>Jenis Kiriman</strong></label>
                                       <select name="kiriman" id="kiriman" class="form-control">
                                            <option value="Email" <?php if ($getdata['kiriman'] == 'Email') echo 'selected'; ?>>Email</option>
                                            <option value="Faks" <?php if ($getdata['kiriman'] == 'Faks') echo 'selected'; ?>>Faks</option>
                                            <option value="Mel Dalaman" <?php if ($getdata['kiriman'] == 'Mel Dalaman') echo 'selected'; ?>>Mel Dalaman</option>
                                            <option value="Pos berdaftar" <?php if ($getdata['kiriman'] == 'Pos berdaftar') echo 'selected'; ?>>Pos berdaftar</option>
                                            <option value="Pos biasa" <?php if ($getdata['kiriman'] == 'Pos biasa') echo 'selected'; ?>>Pos biasa</option>
                                            <option value="Pos laju" <?php if ($getdata['kiriman'] == 'Pos laju') echo 'selected'; ?>>Pos laju</option>
                                            <option value="Serahan tangan" <?php if ($getdata['kiriman'] == 'Serahan tangan') echo 'selected'; ?>>Serahan tangan</option>
                                            <!-- Add more options as needed -->
                                        </select>

                                   </div>
                                   <div class="form-group mb-3">
                                       <label for="salinan_kepada"><strong>Salinan Kepada:</strong></label>
                                       <input type="text" value="<?=$getdata['salinan_kepada'];?>" name="salinan_kepada" id="salinan_kepada" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label for="lampiran"><strong>Lampiran:</strong></label>
                                        <input type="file" name="lampiran" id="lampiran" class="form-control">
                                        <?php if (!empty($getdata['lampiran'])): ?>
                                            <p>Current Attachment: <a href="path_to_attachments_folder/<?=$getdata['lampiran'];?>" target="_blank"><?=$getdata['lampiran'];?></a></p>
                                        <?php endif; ?>
                                    </div>

                                   <div class="form-group mb-3">
                                       <button type="submit" name="update_contact1" class="btn btn-primary">Update Contact</button>
                                   </div>
                               </div>
                           </div>
                        </form>
                     <?php
                            }
                            else
                            {
                                $_SESSION['status'] = "Invalid id";
                                header('Location:index100.php');
                                exit();
                            }
                        }
                            else
                            {
                                $_SESSION['status'] = "No found";
                                header('Location:index100.php');
                                exit();
                            }
                              
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
       function changeContent() {
           var letterType = document.getElementById("letterType");
           var contentDiv = document.getElementById("content");
           var receiverText = document.getElementById("receiverText");
           var receiverDate = document.getElementById("receiverDate");
           var receiverAddress = document.getElementById("receiverAddress");
           var receiverPhone = document.getElementById("receiverPhone");
           var receiverEmail = document.getElementById("receiverEmail");

           if (letterType.value === "keluar") {
            receiverText.innerHTML = "<strong>Nama Penerima:</strong>";
            receiverAddress.innerHTML = "<strong>Alamat Penerima:</strong>";
            receiverDate.innerHTML = "<strong>Tarikh Surat Dikeluarkan:</strong>";
            receiverPhone.innerHTML = "<strong>No. Telefon Penerima:</strong>";
            receiverEmail.innerHTML = "<strong>No. Fax Penerima / Emel Penerima:</strong>";
        } else if (letterType.value === "masuk") {
            receiverText.innerHTML = "<strong>Nama Pengirim:</strong>";
            receiverAddress.innerHTML = "<strong>Alamat Pengirim:</strong>";
            receiverDate.innerHTML = "<strong>Tarikh Surat Terima:</strong>";
            receiverPhone.innerHTML = "<strong>No. Telefon Pengirim:</strong>";
            receiverEmail.innerHTML = "<strong>No. Fax Pengirim / Emel Pengirim:</strong>";
        }
       }
   </script>
<?php
    include('includes/footer.php');
?>