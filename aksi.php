<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            #badan{
                background-color: #578a99;
            }            
            #navi{
                margin-left: 7%;
                height: max-content;
                width: 10%;
                border-radius: 30px;
                padding: 2% 0;
                font-size: 1.1em;
                background-color: #e3ebed;
            }
            .kotak{
                background-color: #e3ebed;
                min-height: 50%;
                max-width: 60%;
                border-radius: 30px;
                margin: 3% auto;
            }
            .isi{
                margin-left: 0;
                padding-top: 1%;             
            }
            input[type=text], select{
                width: 60%;
                border-radius: 10px;
                margin-left: 5%;
                height: 10%;
            }
            .baris, #apa{
                padding-top: 0.5%;
                padding-top: 3%;
           }
           input[type=checkbox], input[type=radio]{
                margin-left: 5%;
           }
           #tabel{
               margin: 0 auto;
               max-width: 90%;
           }
        </style>
    </head>
    <body id="badan">
        <div class="w3-sidebar w3-bar-block" id="navi">
            <a href="home.php" class="w3-bar-item w3-button" style="padding-top: 10%;text-align: center;">Daftar</a>
            <a href="view.php" class="w3-bar-item w3-button" style="text-align: center;">View Data</a>
        </div>
        <div class="kotak">
            
            <div class="isi">
                
                <?php
                include 'koneksi.php';
                $nim = $_GET['nim'];
                $r = mysqli_query($kon,"SELECT * FROM mahasiswa WHERE nim ='".$nim."'");
                $brs = mysqli_fetch_assoc($r);

                //olahraga
                $olahraga = $brs['olahraga'];
                $pisah = explode(',',$olahraga);

                    if($_GET['aksi']=='edit') {
                        ?>

                    <form method="POST" enctype="multipart/form-data" >
                    <div class="row" style="margin-left: 1%;">
                        <div class="col-sm-6">
                            <div class="card-body"">
                                <div class="baris">
                                    <label style="padding-right: 6.5%;">NIM</label>
                                    <input type="text" id="nim" name="nim" value="<?php echo $brs['nim']?>" disabled>
                                </div>
                                <div class="baris">
                                    <label style="padding-right: 2.5%;">Nama</label>
                                    <input type="text" id="nama" name="nama" value="<?php echo $brs['nama']?>">
                                </div>
                                <div class="baris">
                                    <label>Agama</label>
                                    <select name="agama">
                                    <option value="Islam" <?php if($brs['agama'] == 'Islam') echo "selected='selected'";?>>Islam</option>
                                    <option value="Kristen" <?php if($brs['agama'] == 'Kristen') echo "selected='selected'";?>>Kristen</option>
                                    <option value="Katolik" <?php if($brs['agama'] == 'Katolik') echo "selected='selected'";?>>Katolik</option>
                                    <option value="Buddha" <?php if($brs['agama'] == 'Buddha') echo "selected='selected'";?>>Buddha</option>
                                    <option value="Konghucu" <?php if($brs['agama'] == 'Konghucu') echo "selected='selected'";?>>Konghucu</option>
                                    </select>
                                </div>
                                <div class="baris" style="display:inline-block">
                                    <label>Foto Profil</label><br>
                                    <image src="image/<?php echo $brs['foto']?>" style="width: 20%;border-radius: 100px; -moz-border-radius: 100px;">
                                    <input type="file" class="form-control-file" name="foto">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card-body">
                            <div class="col" id="apa">
                                <label>Jenis Kelamin</label><br>
                                <input type="radio" id="male" name="gender" value="cowo" <?php if($brs['kelamin'] == 'Laki-laki')  echo "checked";?>>
                                <label for="male">Laki-laki</label>
                                <input type="radio" id="female" name="gender" value="cewe" <?php if($brs['kelamin'] == 'Perempuan')  echo "checked";?>>
                                <label for="female">Perempuan</label>
                            </div>
                            <div class="col" id="apa">
                                <label>Olahraga Favorit</label><br>
                                <?php 
                                    if(in_array('Sepakbola',$pisah)){
                                        echo '<input type="checkbox" id="hobi1" name="hobi[]" value="Sepakbola" checked>';
                                    }else{
                                        echo '<input type="checkbox" id="hobi1" name="hobi[]" value="Sepakbola">';
                                    }
                                ?>
                                <label for="hobi1">Sepakbola</label>
                                <?php 
                                    if(in_array('Basket',$pisah)){
                                        echo '<input type="checkbox" id="hobi2" name="hobi[]" value="Basket" checked>';
                                    }else{
                                        echo '<input type="checkbox" id="hobi2" name="hobi[]" value="Basket">';
                                    }
                                ?>
                                <label for="hobi2">Basket</label>
                                <?php 
                                    if(in_array('Futsal',$pisah)){
                                        echo '<input type="checkbox" id="hobi3" name="hobi[]" value="Futsal" checked>';
                                    }else{
                                        echo '<input type="checkbox" id="hobi3" name="hobi[]" value="Futsal">';
                                    }
                                ?>
                                <label for="hobi3">Futsal</label><br>
                                <?php 
                                    if(in_array('Renang',$pisah)){
                                        echo '<input type="checkbox" id="hobi4" name="hobi[]" value="Renang" checked>';
                                    }else{
                                        echo '<input type="checkbox" id="hobi4" name="hobi[]" value="Renang">';
                                    }
                                ?>
                                <label for="hobi4">Renang</label>
                                <?php 
                                    if(in_array('Badminton',$pisah)){
                                        echo '<input type="checkbox" id="hobi5" name="hobi[]" value="Badminton" checked>';
                                    }else{
                                        echo '<input type="checkbox" id="hobi5" name="hobi[]" value="Badminton">';
                                    }
                                ?>
                                <label for="hobi5">Badminton</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark btn-block" style="margin: 0 81%;" name="sub">Simpan</button>
                    <?php
                        include 'koneksi.php';

                        if(isset($_POST['sub'])) {

                        $nama = $_POST['nama'];
                        $kelamin = $_POST['gender'];
                        $agama = $_POST['agama'];
                        $olahraga = $_POST['hobi'];
                        $sem = '';

                        //Pilihan Jenis Kelamin
                        if($kelamin == 'cowo') {
                            $sem = 'Laki-laki';
                        }else{
                            $sem = 'Perempuan';
                        }
                        
                        $hobi = '';
                        $i = 0;
                        $pjg = count($olahraga);

                        //Pilihan Hobi
                        foreach ($olahraga as $pilih){
                            if($i == $pjg - 1){
                                $hobi .= $pilih;
                            }else{
                                $hobi .= $pilih.',';
                            }
                            $i++;
                        }

                        //photo profile
                        $boleh	= array('png','jpg');
                        $profil = $_FILES['foto']['name'];
                        $x = explode('.', $profil);
                        $ekstensi = strtolower(end($x));
                        $ukuran	= $_FILES['foto']['size'];
                        $file_tmp = $_FILES['foto']['tmp_name'];


                        if(file_exists($_FILES['foto']['tmp_name']) || is_uploaded_file($_FILES['foto']['tmp_name'])){
                            if(in_array($ekstensi, $boleh) === true){
                                if($ukuran < 1044070){			
                                    move_uploaded_file($file_tmp, 'image/'.$profil);
                                    $query = mysqli_query($kon,"UPDATE  mahasiswa SET nama = '".$nama."', 
                                                                kelamin = '".$sem."', 
                                                                agama = '".$agama."', 
                                                                olahraga = '".$hobi."', 
                                                                foto = '".$profil."'
                                                            WHERE mahasiswa.nim = '".$nim."'");
                                    if($query){
                                        echo "<a href='view.php' style='color:red;'>Data Berhasil diperbaharui, Lihat Data</a>";
                                    }else{
                                        echo '<p style="color:red;">GAGAL MENGUPLOAD GAMBAR</p>';
                                    }
                                }else{
                                    echo '<p style="color:red;">UKURAN FILE TERLALU BESAR</p>';
                                }
                            }else{
                                echo '<p style="color:red;">EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN</p>';
                            }
                        }else{
                            $query = mysqli_query($kon,"UPDATE  mahasiswa SET nama = '".$nama."', 
                                                                kelamin = '".$sem."', 
                                                                agama = '".$agama."', 
                                                                olahraga = '".$hobi."'
                                                            WHERE mahasiswa.nim = '".$nim."'");
                            if($query){
                                echo "<a href='view.php' style='color:red;'>Data Berhasil diperbaharui, Lihat Data</a>";
                            }else{
                                echo '<p style="color:red;">GAGAL MENGINSERT DATA</p>';
                            }

                        }
                            
                        }
                    
                    ?>
                </form>

                        <?php
                    } else {
                        
                        echo "<br>";
                        echo "<center><image style='width:100px;' src='image/warning.png'<br/></center>";
                        echo " <table border=0 width=50% align=center>
                        <tr> <td> Apakah anda yakin akan menghapus <b>".$brs['nama']."</b> dari tabel?</td> </tr>
                        </table><br>" ;
                        echo '<form align=center><input class="btn btn-danger btn-sm" type="submit" name="jawaban" value="Ya" style="margin-right:0.5%;">';
                        echo '<input class="btn btn-success btn-sm" type="submit" name="jawaban" value="Tidak">';
                        echo "<input type='hidden' name='nim' value='$nim'>";
                        echo '<input type="hidden" name="aksi" value="hapus"></form>';
                        if (isset($_GET['jawaban'])){
                            if($_GET['jawaban']=="Ya") {
                                $query = mysqli_query($kon,"DELETE FROM mahasiswa WHERE nim = '".$nim."'");  
                                header("location:view.php");
                            } else {
                                header("location:view.php");
                            }
                          
                        } 
                    }

                ?>

            </div>    
        </div>
    </body>
</html>