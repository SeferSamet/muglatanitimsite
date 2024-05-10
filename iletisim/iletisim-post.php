<?php
include("conn.php");

if ($_POST) {
    if(!(empty($_POST))){
    $ad_soyad = $_POST['ad_soyad'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $mesaj = $_POST['mesaj'];

    $sql_query = "INSERT INTO tb_iletisim (ad_soyad, telefon, email, mesaj) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql_query);//hazırlama islemi

 
    $stmt->bind_param("ssss", $ad_soyad, $telefon, $email, $mesaj);/*her bir 's' bir string degeri temsil eder */

    
   

    if ( $stmt->execute()) {
        header("Location:iletisim.php?success=1");
    } else {
        header("Location:iletisim.php?failed=1");
    }

  
    $stmt->close();
    
    }
    else{
        header("Location:iletisim.php?failed=1");
    }
}


$conn->close();
?>
