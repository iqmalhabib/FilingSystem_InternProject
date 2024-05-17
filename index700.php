<?php
    include('authentication.php'); 
    include('includes/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5>Jumlah bilangan Surat:<?php
                            include('dbcon.php');
                            $ref_table = 'index700'; 
                            $total_count = $database->getReference($ref_table)->getSnapshot()->numChildren();
                            echo $total_count;
                        ?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <?php
                if(isset($_SESSION['status']))
                {
                    echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                    unset($_SESSION['status']);
                }
            ?>

            <div class="card">
                <div class="card-header">
                    <h4>&nbsp; Hal Ehwal Akademik : Merekod Surat Masuk dan Keluar</h4>
                </div>
                <div class="card-body" style="max-height: 280px; overflow-y: auto;">
                    <table class="table table-border-striped">
                        <thead class="thead">
                            <tr>
                                <th>Bil</th>
                                <th>Kategori Surat</th>
                                <th>No. Rujukan</th>
                                <th>Tarikh Surat</th>
                                <th>Nama Organisasi</th>
                                <th>Jenis Surat</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('dbcon.php');
                                $ref_table='index700';
                                $fetchdata = $database->getReference($ref_table)->getValue();
                                if($fetchdata > 0)
                                {
                                    $i = 1;
                                    foreach($fetchdata as $key => $row)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $i++;?></td>
                                            <td><?=$row['letterType'];?></td>
                                            <td><?= $row['no_rujukan'];?></td>
                                            <td><?= $row['surat_date'];?></td>
                                            <td><?= $row['first_name'];?></td>
                                            <td><?= $row['jenis'];?></td>
                                            <td>
                                                <a href="edit-contact7.php?id=<?=$key;?>" class="btn btn-primary btn-sm">Edit</a>
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button type="submit" name="delete_btn7" value="<?=$key?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="7">No record found</td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center">
                    <a href="add-contact700.php" class="btn btn-primary">Tambah surat baru</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include('includes/footer.php');
?>
