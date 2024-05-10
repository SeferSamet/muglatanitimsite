<?php
session_start();
if (!isset($_SESSION['login_user'])) {//eğer oturum açılmadıysa deger yoksa anlamına gelir
    header("location: index.php");
}


?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="adminpage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Welcome</title>
</head>
<body>

<section class="page">

<div class="row animated-element">
    <div class="col-12 baslik">

        <h1>Merhaba, <?php echo $_SESSION['login_user'] ;?>
        <a href="logout.php">Oturumu Kapat</a>
    </div>
    
</div>
<div class="row animated-element icerik">
    <div class="col-12 ">
    <?php 
        include("conn.php");
            // SQL sorgusu
        $sql = "SELECT * FROM tb_iletisim";

        // Sorguyu çalıştırma ve sonuçları alma
        $result = $conn->query($sql);

        // Sorgu sonuçlarını kontrol etme
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                // Sonuçları işleme
                //echo "ID: " . $row["id"].'<br>'. " - Ad: " . $row["ad_soyad"].'<br>'. " - Telefon: " . $row["telefon"].'<br>'. " - Email: " . $row["email"].'<br>'. "  Mesaj: " . $row["mesaj"]. "<br>";*/
               
                

                echo "
                <table style='
                    margin-top:3%;
                    font-size:20px;
                    
                    
                '>
                <tr>
                    <td>ID</td>
                    <td>:</td>
                    <td >" . $row['id'] . "</td>
                </tr>
                
                <tr>
                    <td>Adı Soyadı</td>
                    <td>:</td>
                    <td>" . $row['ad_soyad'] . "</td>
                </tr>

                <tr>
                    <td>Telefon</td>
                    <td>:</td>
                    <td>" . $row['telefon'] . "</td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>" . $row['email'] . "</td>
                </tr>

                <tr>
                    <td>Mesaj</td>
                    <td>:</td>
                    <td>" . $row['mesaj'] . "</td>
                </tr>
                 </table>
            ";
            
            }
        }
    ?>
    
   
        

    
</div>
</section>
<script>
    var deger = document.getElementsByTagName('gelen1');
    var buttoncuk = elementToHide.querySelector('gercekbutonum');
    if(deger==document.getElementsByTagName('gelen1')[0]){
        
    }
    else{

        gercekbutonum.style.display = 'none';
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>