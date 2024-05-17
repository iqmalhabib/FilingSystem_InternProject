<?php
include "authentication.php";
include "includes/header.php";
?>

<div class="container">
    <div class="row">
        <div class="card-header">
            <h4>
                <a href="export.php" class="btn btn-success float-end">Export to Excel</a>
            </h4>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5>Bil Surat dalam Rekod:<?php
                        include "dbcon.php";

                        // Initialize total count
                        $total_count = 0;

                        // Dynamically detect and display records from index100 to index900
                        for (
                            $tableIndex = 100;
                            $tableIndex <= 900;
                            $tableIndex += 100
                        ) {
                            $ref_table = "index" . $tableIndex;
                            $fetchdata = $database
                                ->getReference($ref_table)
                                ->getValue();

                            if ($fetchdata > 0) {
                                $total_count += count($fetchdata);
                            }
                        }

                        echo $total_count;
                        ?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <?php if (isset($_SESSION["status"])) {
                echo "<h5 class='alert alert-success'>" .
                    $_SESSION["status"] .
                    "</h5>";
                unset($_SESSION["status"]);
            } ?>

            <div class="card">
                <div class="card-reader">
                    <h4>&nbsp;Laporan</h4>
                    <!-- Filter options -->
                    <form method="post" action="">
                        <label for="jenis">&nbsp;Jenis Surat:</label>
                        <select name="jenis" id="jenis">
                            <option value="">All</option>
                            <option value="Surat rasmi">Surat rasmi</option>
                            <option value="Emel rasmi">Emel rasmi</option>
                            <option value="GRN">GRN</option>
                            <option value="LO">LO</option>
                            <option value="Pekeliling">Pekeliling</option>
                            <!-- Add more options as needed -->
                        </select>

                        <label for="letterType">Surat Masuk/Keluar:</label>
                        <select name="letterType" id="letterType">
                            <option value="">All</option>
                            <option value="masuk">Surat Masuk</option>
                            <option value="keluar">Surat Keluar</option>
                            <!-- Add more options as needed -->
                        </select>
                        <label for="Indeks">Indeks:</label>
                        <select name="Indeks" id="Indeks">
                            <option value="">All</option>
                            <option value="index100">Indeks 100</option>
                            <option value="index200">Indeks 200</option>
                            <option value="index300">Indeks 300</option>
                            <option value="index400">Indeks 400</option>
                            <option value="index500">Indeks 500</option>
                            <option value="index600">Indeks 600</option>
                            <option value="index700">Indeks 700</option>
                            <option value="index800">Indeks 800</option>
                            <option value="index900">Indeks 900</option>
                            <!-- Add more options as needed -->
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-border-striped">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>No. Rujukan</th>
                                <th>Tarikh Surat</th>
                                <th>Email</th>
                                <th>Jenis Surat</th>
                                <th>Surat Masuk/Keluar</th>
                                <th>Indeks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Dynamically detect and display records from index100 to index900
                            $i = 1;
                            for (
                                $tableIndex = 100; $tableIndex <= 900; $tableIndex += 100) {
                                $ref_table = "index" . $tableIndex;
                                $fetchdata = $database->getReference($ref_table)->getValue();

                                if (!empty($fetchdata)) {
                                    foreach ($fetchdata as $key => $row) {
                                        // Apply filter conditions
                                        $jenis_filter = isset($_POST["jenis"])? $_POST["jenis"]: "";
                                        $letterType_filter = isset($_POST["letterType"],)? $_POST["letterType"]: "";
                                        $index_filter = isset($_POST["Indeks"]) ? $_POST["Indeks"] : "";

                                        if (
                                            ($jenis_filter == "" ||$row["jenis"] == $jenis_filter) &&
                                            ($letterType_filter == "" || $row["letterType"] == $letterType_filter) && 
                                            ($index_filter == "" || $ref_table == $index_filter)
                                            ) { ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $row["no_rujukan"] ?></td>
                                                    <td><?= $row["surat_date"] ?></td>
                                                    <td><?= $row["email"] ?></td>
                                                    <td><?= $row["jenis"] ?></td>
                                                    <td><?= $row["letterType"] ?></td>  
                                                    <td><?= $ref_table ?></td> <!-- Display the index value -->                  
                                                </tr>
                                                <?php }
                                    }
                                }
                            }
                            ?>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php";
?>
