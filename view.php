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
                <h3 style="font-weight: bold;text-align: center;">View Data</h3>
                <table class="table" id="tabel">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Olahraga Favorit</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    include "koneksi.php";
                    $r = mysqli_query($kon,"SELECT * FROM mahasiswa");
                    while ($brs = mysqli_fetch_assoc($r)) {?>
                      <tr>
                        <td><img style="width:50px;border-radius: 100px; -moz-border-radius: 100px;" src="<?php echo "image/".$brs['foto'];?>" alt="" ></td>
                        <td><?php echo $brs['nim']; ?></td>
                        <td><?php echo $brs['nama']; ?></td>
                        <td><?php echo $brs['kelamin']; ?></td>
                        <td><?php echo $brs['agama']; ?></td>
                        <td><?php echo $brs['olahraga']; ?></td>
                        <td>
                        <a href="<?php echo "aksi.php?aksi=edit&nim=".$brs['nim'] ?>"><button type="button" class="btn btn-warning btn-sm" >Edit</button></a>
                        <a href="<?php echo "aksi.php?aksi=hapus&nim=".$brs['nim'] ?>"><button type="button" class="btn btn-danger btn-sm" >Hapus</button></a>
                        </td>
                      </tr>
        <?php } ?>
                    </tbody>
                  </table>
            </div>    
        </div>
    </body>
</html>