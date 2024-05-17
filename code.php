<?php
session_start();
include('dbcon.php');

function redirectTo($location) {
    header("Location: $location");
    exit();
}

function handleContactAction($database, $ref_table, $postData) {
    $postRef_result = $database->getReference($ref_table)->push($postData);
    if ($postRef_result) {
        $_SESSION['status'] = "Contact action successful";
    } else {
        $_SESSION['status'] = "Contact action failed";
    }
    redirectTo($ref_table . '.php');
}

if (isset($_POST['register_btn'])) {
    $fullname = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['status'] = "Invalid email address";
        redirectTo('register.php');
        exit();
    }

    // If email is valid, proceed to create the user
    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'phoneNumber' => '+60' . $phone,
        'password' => $password,
        'displayName' => $fullname,
    ];

    try {
        $createdUser = $auth->createUser($userProperties);

        if ($createdUser) {
            $_SESSION['status'] = "User Created/Registered Successfully";
        } else {
            $_SESSION['status'] = "User Not Created/Registered";
        }

        redirectTo('register.php');
    } catch (Exception $e) {
        $_SESSION['status'] = "Error creating user: " . $e->getMessage();
        redirectTo('register.php');
    }
}


if (isset($_POST['delete_btn1'])) {
    $del_id = $_POST['delete_btn1'];
    $ref_table = 'index100/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Contact deleted successfully";
    } else {
        $_SESSION['status'] = "Contact not deleted";
    }
    redirectTo('index100.php');
}

if (isset($_POST['update_contact1'])) {
    $key = $_POST['key'];
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $updateData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = 'index100/'.$key;
    $updatequery_result = $database->getReference($ref_table)->update($updateData);
    
    if ($updatequery_result) {
        $_SESSION['status'] = "Contact updated successfully";
    } else {
        $_SESSION['status'] = "Contact not updated";
    }
    redirectTo('index100.php');
}

if (isset($_POST['save_contact1'])) {
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $postData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = "index100";
    handleContactAction($database, $ref_table, $postData);
}

// Add similar blocks of code for other index pages as needed.
if (isset($_POST['delete_btn2'])) {
    $del_id = $_POST['delete_btn2'];
    $ref_table = 'index200/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Contact deleted successfully";
    } else {
        $_SESSION['status'] = "Contact not deleted";
    }
    redirectTo('index200.php');
}

if (isset($_POST['update_contact2'])) {
    $key = $_POST['key'];
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $updateData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = 'index200/'.$key;
    $updatequery_result = $database->getReference($ref_table)->update($updateData);
    
    if ($updatequery_result) {
        $_SESSION['status'] = "Contact updated successfully";
    } else {
        $_SESSION['status'] = "Contact not updated";
    }
    redirectTo('index200.php');
}
if (isset($_POST['save_contact2'])) {
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $postData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = "index200";
    handleContactAction($database, $ref_table, $postData);
}

if (isset($_POST['delete_btn3'])) {
    $del_id = $_POST['delete_btn3'];
    $ref_table = 'index300/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Contact deleted successfully";
    } else {
        $_SESSION['status'] = "Contact not deleted";
    }
    redirectTo('index300.php');
}

if (isset($_POST['update_contact3'])) {
    $key = $_POST['key'];
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $updateData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = 'index300/'.$key;
    $updatequery_result = $database->getReference($ref_table)->update($updateData);
    
    if ($updatequery_result) {
        $_SESSION['status'] = "Contact updated successfully";
    } else {
        $_SESSION['status'] = "Contact not updated";
    }
    redirectTo('index300.php');
}
if (isset($_POST['save_contact3'])) {
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $postData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = "index300";
    handleContactAction($database, $ref_table, $postData);
}

if (isset($_POST['delete_btn4'])) {
    $del_id = $_POST['delete_btn4'];
    $ref_table = 'index300/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Contact deleted successfully";
    } else {
        $_SESSION['status'] = "Contact not deleted";
    }
    redirectTo('index400.php');
}

if (isset($_POST['update_contact4'])) {
    $key = $_POST['key'];
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $updateData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = 'index400/'.$key;
    $updatequery_result = $database->getReference($ref_table)->update($updateData);
    
    if ($updatequery_result) {
        $_SESSION['status'] = "Contact updated successfully";
    } else {
        $_SESSION['status'] = "Contact not updated";
    }
    redirectTo('index400.php');
}
if (isset($_POST['save_contact4'])) {
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $postData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = "index400";
    handleContactAction($database, $ref_table, $postData);
}

if (isset($_POST['delete_btn5'])) {
    $del_id = $_POST['delete_btn5'];
    $ref_table = 'index500/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Contact deleted successfully";
    } else {
        $_SESSION['status'] = "Contact not deleted";
    }
    redirectTo('index500.php');
}

if (isset($_POST['update_contact5'])) {
    $key = $_POST['key'];
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $updateData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = 'index500/'.$key;
    $updatequery_result = $database->getReference($ref_table)->update($updateData);
    
    if ($updatequery_result) {
        $_SESSION['status'] = "Contact updated successfully";
    } else {
        $_SESSION['status'] = "Contact not updated";
    }
    redirectTo('index500.php');
}
if (isset($_POST['save_contact5'])) {
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $postData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = "index500";
    handleContactAction($database, $ref_table, $postData);
}

if (isset($_POST['delete_btn6'])) {
    $del_id = $_POST['delete_btn6'];
    $ref_table = 'index600/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Contact deleted successfully";
    } else {
        $_SESSION['status'] = "Contact not deleted";
    }
    redirectTo('index600.php');
}

if (isset($_POST['update_contact6'])) {
    $key = $_POST['key'];
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $updateData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = 'index600/'.$key;
    $updatequery_result = $database->getReference($ref_table)->update($updateData);
    
    if ($updatequery_result) {
        $_SESSION['status'] = "Contact updated successfully";
    } else {
        $_SESSION['status'] = "Contact not updated";
    }
    redirectTo('index600.php');
}
if (isset($_POST['save_contact6'])) {
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $postData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = "index600";
    handleContactAction($database, $ref_table, $postData);
}

if (isset($_POST['delete_btn7'])) {
    $del_id = $_POST['delete_btn7'];
    $ref_table = 'index700/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Contact deleted successfully";
    } else {
        $_SESSION['status'] = "Contact not deleted";
    }
    redirectTo('index700.php');
}

if (isset($_POST['update_contact7'])) {
    $key = $_POST['key'];
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $updateData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = 'index700/'.$key;
    $updatequery_result = $database->getReference($ref_table)->update($updateData);
    
    if ($updatequery_result) {
        $_SESSION['status'] = "Contact updated successfully";
    } else {
        $_SESSION['status'] = "Contact not updated";
    }
    redirectTo('index700.php');
}
if (isset($_POST['save_contact7'])) {
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $postData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = "index700";
    handleContactAction($database, $ref_table, $postData);
}

if (isset($_POST['delete_btn8'])) {
    $del_id = $_POST['delete_btn8'];
    $ref_table = 'index800/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Contact deleted successfully";
    } else {
        $_SESSION['status'] = "Contact not deleted";
    }
    redirectTo('index800.php');
}

if (isset($_POST['update_contact8'])) {
    $key = $_POST['key'];
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $updateData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = 'index800/'.$key;
    $updatequery_result = $database->getReference($ref_table)->update($updateData);
    
    if ($updatequery_result) {
        $_SESSION['status'] = "Contact updated successfully";
    } else {
        $_SESSION['status'] = "Contact not updated";
    }
    redirectTo('index800.php');
}
if (isset($_POST['save_contact8'])) {
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $postData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = "index800";
    handleContactAction($database, $ref_table, $postData);
}

if (isset($_POST['delete_btn9'])) {
    $del_id = $_POST['delete_btn9'];
    $ref_table = 'index900/' . $del_id;
    $deletequery_result = $database->getReference($ref_table)->remove();

    if ($deletequery_result) {
        $_SESSION['status'] = "Contact deleted successfully";
    } else {
        $_SESSION['status'] = "Contact not deleted";
    }
    redirectTo('index900.php');
}

if (isset($_POST['update_contact9'])) {
    $key = $_POST['key'];
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $updateData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = 'index900/'.$key;
    $updatequery_result = $database->getReference($ref_table)->update($updateData);
    
    if ($updatequery_result) {
        $_SESSION['status'] = "Contact updated successfully";
    } else {
        $_SESSION['status'] = "Contact not updated";
    }
    redirectTo('index900.php');
}
if (isset($_POST['save_contact9'])) {
    $letterType = $_POST['letterType'];
    $no_rujukan = $_POST['no_rujukan'];
    $surat_date = $_POST['surat_date'];
    $surat_io = $_POST['surat_io'];
    $perkara = $_POST['perkara'];
    $first_name = $_POST['first_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $peringkat = $_POST['peringkat'];
    $jenis = $_POST['jenis'];
    $kiriman = $_POST['kiriman'];
    $salinan_kepada = $_POST['salinan_kepada'];
    $lampiran = $_POST['lampiran'];

    $postData = [
        'letterType' => $letterType,
        'no_rujukan' => $no_rujukan,
        'surat_date' => $surat_date,
        'surat_io' => $surat_io,
        'perkara' => $perkara,
        'first_name' => $first_name,
        'address' => $address,
        'phone' => $phone,
        'email' => $email,
        'peringkat' => $peringkat,
        'jenis' => $jenis,
        'kiriman' => $kiriman,
        'salinan_kepada' => $salinan_kepada,
        'lampiran' => $lampiran
    ];
    $ref_table = "index900";
    handleContactAction($database, $ref_table, $postData);
}

?>
