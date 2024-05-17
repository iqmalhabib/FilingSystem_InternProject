<?php
include('authentication.php');
include('dbcon.php');
include('vendor/autoload.php'); // Include the PhpSpreadsheet autoload file

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="exported_data.xlsx"');
header('Cache-Control: max-age=0');

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Add headers to the Excel file
$sheet->setCellValue('A1', 'Surat Masuk/Keluar');
$sheet->setCellValue('B1', 'No. Rujukan');
$sheet->setCellValue('C1', 'Tarikh Surat');
$sheet->setCellValue('D1', 'Surat Masuk/Keluar');
$sheet->setCellValue('E1', 'Perkara');
$sheet->setCellValue('F1', 'Nama Pengirim/Penerima');
$sheet->setCellValue('G1', 'Alamat Pengirim/Penerima');
$sheet->setCellValue('H1', 'No. Telefon Pengirim/Penerima');
$sheet->setCellValue('I1', 'No. Fax/Email');
$sheet->setCellValue('J1', 'Dokumen Terperingkat');
$sheet->setCellValue('K1', 'Jenis Surat');
$sheet->setCellValue('L1', 'Jenis Kiriman');
$sheet->setCellValue('M1', 'Salinan Kepada');
$sheet->setCellValue('N1', 'Lampiran');

// Fetch data from multiple tables (index100 to index900)
for ($tableIndex = 100; $tableIndex <= 900; $tableIndex += 100) {
    $ref_table = 'index' . $tableIndex;
    $fetchdata = $database->getReference($ref_table)->getValue();

    if ($fetchdata > 0) {
        $row = count($sheet->toArray()) + 1; // Get the next available row

        foreach ($fetchdata as $rowData) {
            $sheet->setCellValue('A' . $row, $rowData['letterType']);
            $sheet->setCellValue('B' . $row, $rowData['no_rujukan']);
            $sheet->setCellValue('C' . $row, $rowData['surat_date']);
            $sheet->setCellValue('D' . $row, $rowData['surat_io']);
            $sheet->setCellValue('E' . $row, $rowData['perkara']);
            $sheet->setCellValue('F' . $row, $rowData['first_name']);
            $sheet->setCellValue('G' . $row, $rowData['address']);
            $sheet->setCellValue('H' . $row, $rowData['phone']);
            $sheet->setCellValue('I' . $row, $rowData['email']);
            $sheet->setCellValue('J' . $row, $rowData['peringkat']);
            $sheet->setCellValue('K' . $row, $rowData['jenis']);
            $sheet->setCellValue('L' . $row, $rowData['kiriman']);
            $sheet->setCellValue('M' . $row, $rowData['salinan_kepada']);
            $sheet->setCellValue('N' . $row, $rowData['lampiran']);
            // Add other fields accordingly

            $row++; // Move to the next row
        }
    }
}

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>
