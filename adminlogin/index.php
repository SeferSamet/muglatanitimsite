<?php
    session_start();
    require('connadmin.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $query = "SELECT id FROM tb_adminlogin WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $_SESSION['login_user'] = $username;//eğer kullanıcı adı şifre doğru ise oturum açılıyor
            $info="Kullanıcı Adı Şifre Doğru. Yölendiriliyorsunuz";
            header("Refresh:2; adminpage.php");
            
        } else {
            $info = "Geçersiz kullanıcı adı veya şifre";
        }
    }
?>
<!DOCTYPE html>
<html lang="tr">
  <head>
<meta charset="UTF-8">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="icon" href="../images/M.png" width="500px" height="500px">
<meta charset="UTF-8" />

    <link rel="stylesheet" href="index">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/scrollreveal"></script>
    
    <title>Muğla | Admin Page</title>
    <style>
           .page  .ickapsa{
            box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);
                position: absolute;
                float:left;
                top:11%;
                left:16%;
                z-index:20; 

                background-color:lightgreen;
                width:1300px;
                

                padding:30px;
               
                border-radius:30px;

           }
          .page .container{
            display: flex;
            position: relative;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top:5%;
            background-color:#6e4744;
            /*
            background:url("../images/mugladogal2.jpg");
            background-size:cover;
            background-position:center;*/
            box-shadow: 5px 5px 10px 10px rgba(0, 0, 0, 0.5);
            border-radius:30px;

        }
        .page .container form{
            box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);
            background-color: transperent;
            backdrop-filter:blur(5px);
            border-radius:20px;
            margin:10% 10% 10% 5%; padding:5%;

            border:2px solid gray;
        }



        .container form table tr td input{
            background-color: white;
            font-size:10px;
            margin:20px 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            padding:5px 10px;
            border-radius: 50px;
        }
        
        .container form table tr td label{
            margin:0 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
  color: white;
            font-size:15px;
        }
        .container form table .gonderbutton td {
            text-align: center;
            font-size:25px;
        }
       
        .container form table .gonderbutton td input {
            
            font-size:15px;
        }


        .container form table tr td input:hover, .mesaj:hover{
            
            background-color: rgb(187, 174, 174);
        }
        .container form table tr td  .mesaj:hover{
            
            background-color: rgb(187, 174, 174);
        }
        .container form div{
            font-size:15px;
        }


    </style>
  </head>
  <body><!--Bu spanı sil responsive lazım-->
  <span class="alert alert-warning text-center " style="left:30%;"><b>Not: </b>Anasayfaya dönmek istiyorsanız <code>Alt</code> tuşuna <b>3</b> saniye basılı tutunuz. </span>
  <section class="page">
  
      <div class="container">
        <img style="border-radius:30px;background-color: rgba(187, 174, 174,0.1);" src="L.png" width="600px" height="650px">

        <form method="POST" >
        <?php if (isset($info)) echo "<div class='alert alert-success'> $info </div>"; ?>
              
            
          
          
          <table>
           
          <tr>
              <td>
                <h3>Oturum Aç<h3><br>
              </td>

             
            </tr>

            <tr>
              <td>
                <label>Kullanıcı Adı</label><br>
              </td>

              <td class="ikinokta">
                <label>:</label><br>
              </td>

              <td>
                <input type="text" name="username" class="username" required>
              </td>
            </tr>
          
            <tr>
              <td>
                <label>Şifre</label><br>
              </td>

              <td class="ikinokta">
                <label>:</label><br>
              </td>

              <td>
                <input type="password" name="password" class="sifre" required>
              </td>
            </tr>

            <tr class="gonderbutton">
              <td>
                <input type="submit" value="Login">
              </td>
              
            </tr>
            
            
          </table>
         
        </form>
        
      </div>
     
    </section>
    <script>
    var altKeyDownTime = 0;
    var altKeyTimer;

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Alt') {
            altKeyDownTime = new Date().getTime();
            altKeyTimer = setTimeout(function() {
                // 3 saniye sonra başka bir sayfaya yönlendir
                window.location.href = '../index.html';
            }, 3000);
        }
    });

    document.addEventListener('keyup', function(event) {
        if (event.key === 'Alt') {
            clearTimeout(altKeyTimer);

            // 3 saniye boyunca basılmış mı kontrol et
            if (new Date().getTime() - altKeyDownTime < 3000) {
                // 3 saniye boyunca basılmamışsa iptal et
                altKeyDownTime = 0;
            }
        }
    });


</script>
    <script>ScrollReveal().reveal('.animated-element', { delay: 300 });</script>
    <script src="https://unpkg.com/scrollreveal"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../script/index.js"></script>
  </body>
</html>
