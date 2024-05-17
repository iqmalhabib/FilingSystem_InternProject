<?php
        include('authentication.php');
        include('includes/header.php');
    ?> 
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <h4>Merekod Maklumat Surat<a href="index200.php" class="btn btn-danger float-end">Back</a>
                       </h4>
                   </div>
                   <div class="card-body">
                       <form action="code.php" method="POST">
                       <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <strong>Pilih Surat Masuk/Keluar</strong><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="letterType" id="masuk" value="masuk" onchange="changeContent()">
                                    <label class="form-check-label" for="masuk">Surat Masuk</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="letterType" id="keluar" value="keluar" onchange="changeContent()">
                                    <label class="form-check-label" for="keluar">Surat Keluar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                           <div class="row">
                               <!----to add row for two column -->
                               <div class="col-md-6">
                                   <!--first column-->
                                   <div class="form-group mb-3">
                                       <label for="first_name"><strong>No. Rujukan</strong></label>
                                       <input type="text" name="no_rujukan" id="no_rujukan" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                       <label for="tarikh"><strong>Tarikh Surat</strong></label>
                                       <input type="date" name="surat_date" id="surat_date" class="form-control">
                                   </div>
                                   <div class="form-group mb-3" id="content">
                                       <label id="receiverDate"><strong>Tarikh Surat Terima/Dikeluarkan:</strong></label>
                                       <input type="date" name="surat_io" id="surat_io" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                       <label for="perkara"><strong>Perkara</strong></label>
                                       <input type="text" name="perkara" id="perkara" class="form-control">
                                   </div>
                                   <div class="form-group mb-3" id="content">
                                       <label id="receiverText"><strong>Nama Pengirim/Penerima:</strong></label>
                                       <input type="text" name="first_name" id="first_name" class="form-control">
                                   </div>
                                   <div class="form-group mb-3" id="content">
                                       <label id="receiverAddress"><strong>Alamat Pengirim/Penerima:</strong></label>
                                       <input type="text" name="address" id="address" class="form-control">
                                   </div>
                                   <div class="form-group mb-3" id="content">
                                       <label id="receiverPhone"><strong>No. Telefon Pengirim/Penerima:</strong></label>
                                       <input type="tel" name="phone" id="phone" class="form-control" placeholder="+60-123456789" pattern="[0-9]{2}-[0-9]{9}" required>
                                   </div>
                                   <div class="form-group mb-3" id="content">
                                       <label id="receiverEmail" for="email"><strong>No. Fax / Email</strong></label>
                                       <input type="email" name="email" id="email" class="form-control"><!--placeholder="abc@gmail.com" pattern="[a-zA-Z0-9._%+-]+@gmail\.com" required-->
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <!-- Second column -->
                                   <div class="form-group mb-3">
                                       <label for="peringkat"><strong>Dokumen Terperingkat</strong></label>
                                       <select name="peringkat" id="peringkat" class="form-control">
                                           <option value="Terhad">Terhad</option>
                                           <option value="Sulit ">Sulit</option>
                                           <option value="Rahsia">Rahsia</option>
                                           <option value="Rahsia besar">Rahsia besar</option>
                                           <!-- Add more options as needed -->
                                       </select>
                                   </div>
                                   <div class="form-group mb-3">
                                       <label for="jenis"><strong>Jenis Surat</strong></label>
                                       <select name="jenis" id="jenis" class="form-control">
                                           <option value="Surat rasmi">Surat rasmi</option>
                                           <option value="Emel rasmi">Emel rasmi</option>
                                           <option value="GRN">GRN</option>
                                           <option value="LO">LO</option>
                                           <option value="Pekeliling">Pekeliling</option>
                                           <!-- Add more options as needed -->
                                       </select>
                                   </div>
                                   <div class="form-group mb-3">
                                       <label for="kiriman"><strong>Jenis Kiriman</strong></label>
                                       <select name="kiriman" id="kiriman" class="form-control">
                                           <option value="Email">Email</option>
                                           <option value="Faks">Faks</option>
                                           <option value="Mel Dalaman">Mel Dalaman</option>
                                           <option value="Pos berdaftar">Pos berdaftar</option>
                                           <option value="Pos biasa">Pos biasa</option>
                                           <option value="Pos laju">Pos laju</option>
                                           <option value="Serahan tangan">Serahan tangan</option>
                                           <!-- Add more options as needed -->
                                       </select>
                                   </div>
                                   <div class="form-group mb-3">
                                       <label for="salinan_kepada"><strong>Salinan Kepada:</strong></label>
                                       <input type="text" name="salinan_kepada" id="salinan_kepada" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label for="lampiran"><strong>Lampiran:</strong></label>
                                        <input type="file" name="lampiran" id="lampiran" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                       <button type="submit" name="save_contact2" class="btn btn-primary">Save</button>
                                   </div>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <script>
       function changeContent() {
    var masuk = document.getElementById("masuk");
    var contentDiv = document.getElementById("content");
    var receiverText = document.getElementById("receiverText");
    var receiverDate = document.getElementById("receiverDate");
    var receiverAddress = document.getElementById("receiverAddress");
    var receiverPhone = document.getElementById("receiverPhone");
    var receiverEmail = document.getElementById("receiverEmail");

    if (masuk.checked) {
        receiverText.innerHTML = "<strong>Nama Pengirim:</strong>";
        receiverAddress.innerHTML = "<strong>Alamat Pengirim:</strong>";
        receiverDate.innerHTML = "<strong>Tarikh Surat Terima:</strong>";
        receiverPhone.innerHTML = "<strong>No. Telefon Pengirim:</strong>";
        receiverEmail.innerHTML = "<strong>No. Fax Pengirim / Emel Pengirim:</strong>";
    } else {
        receiverText.innerHTML = "<strong>Nama Penerima:</strong>";
        receiverAddress.innerHTML = "<strong>Alamat Penerima:</strong>";
        receiverDate.innerHTML = "<strong>Tarikh Surat Dikeluarkan:</strong>";
        receiverPhone.innerHTML = "<strong>No. Telefon Penerima:</strong>";
        receiverEmail.innerHTML = "<strong>No. Fax Penerima / Emel Penerima:</strong>";
    }
}

   </script> <?php
        include('includes/footer.php');
    ?>