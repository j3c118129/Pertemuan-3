<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                padding-top: 1%;             
            }
            input[type=text], select{
                width: 60%;
                border-radius: 10px;
                margin-left: 5%;
                height: 13%;
            }
            .baris, #apa{
                padding-top: 0.5%;
                padding-top: 3%;
           }
           input[type=checkbox], input[type=radio]{
                margin-left: 5%;
           }
        </style>
    </head>
    <body id="badan">
        <div class="w3-sidebar  w3-bar-block" id="navi">
            <a href="home.php" class="w3-bar-item w3-button" style="padding-top: 10%;text-align: center;">Daftar</a>
            <a href="view.php" class="w3-bar-item w3-button" style="text-align: center;">View Data</a>
        </div>
        <div class="kotak">
           
            <div class="isi">
                <h3 style="font-weight: bold;text-align: center;">Form Pendaftaran</h3>
                <form method="POST" enctype="multipart/form-data" >
                    <div class="row" style="margin-left: 1%;">
                        <div class="col-sm-6">
                            <div class="card-body"">
                                <div class="baris">
                                    <label style="padding-right: 6.5%;">NIM</label>
                                    <input type="text" id="nim" name="nim">
                                </div>
                                <div class="baris">
                                    <label style="padding-right: 2.5%;">Nama</label>
                                    <input type="text" id="nama" name="nama">
                                </div>
                                <div class="baris">
                                    <label>Agama</label>
                                    <select name="agama">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                                <div class="baris">
                                    <label>Foto Profil</label>
                                    <input type="file" class="form-control-file" name="foto">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card-body">
                            <div class="col" id="apa">
                                <label>Jenis Kelamin</label><br>
                                <input type="radio" id="male" name="gender" value="cowo">
                                <label for="male">Laki-laki</label>
                                <input type="radio" id="female" name="gender" value="cewe">
                                <label for="female">Perempuan</label>
                            </div>
                            <div class="col" id="apa">
                                <label>Olahraga Favorit</label><br>
                                <input type="checkbox" id="hobi1" name="hobi[]" value="Sepakbola">
                                <label for="hobi1">Sepakbola</label>
                                <input type="checkbox" id="hobi2" name="hobi[]" value="Basket">
                                <label for="hobi2">Basket</label>
                                <input type="checkbox" id="hobi3" name="hobi[]" value="Futsal">
                                <label for="hobi3">Futsal</label><br>
                                <input type="checkbox" id="hobi4" name="hobi[]" value="Renang">
                                <label for="hobi4">Renang</label>
                                <input type="checkbox" id="hobi5" name="hobi[]" value="Badminton">
                                <label for="hobi5">Badminton</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark btn-block" style="margin: 0 81%;" name="sub">Simpan</button>
                    <?php
                        include 'koneksi.php';

                        if(isset($_POST['sub'])) {

                        $nim = $_POST['nim'];
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

                        $boleh	= array('png','jpg');
                        $profil = $_FILES['foto']['name'];
                        $x = explode('.', $profil);
                        $ekstensi = strtolower(end($x));
                        $ukuran	= $_FILES['foto']['size'];
                        $file_tmp = $_FILES['foto']['tmp_name'];

                        if(in_array($ekstensi, $boleh) === true){
                            if($ukuran < 1044070){			
                                move_uploaded_file($file_tmp, 'image/'.$profil);
                                $query = mysqli_query($kon,"INSERT INTO mahasiswa (nim, nama, kelamin, agama, olahraga, foto) 
                                                            VALUES ('".$nim."', '".$nama."', '".$sem."', '".$agama."', '".$hobi."', '".$profil."')");
                                if($query){
                                    echo "<a href='view.php' style='color:red;'>Data Berhasil di Upload, Lihat Data</a>";
                                }else{
                                    echo '<p style="color:red;">GAGAL MENGUPLOAD GAMBAR</p>';
                                }
                            }else{
                                echo '<p style="color:red;">UKURAN FILE TERLALU BESAR</p>';
                            }
                        }else{
                            echo '<p style="color:red;">EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN</p>';
                        }
                            
                        }
                    
                    ?>
                </form>
            </div>    
        </div>
    </body>
</html>