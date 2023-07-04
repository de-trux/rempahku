<?php
// referensikan file ".php"
include "function.php";
include "auth_session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Rempah</title>
    
    <!-- All CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#">REMPAHKU</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="about.php">Tentang Kami</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="destroy.php">Keluar</a>
              </li>      
            </ul>
          </div>
        </div>
      </nav>
      </div>
      <!-- section starts -->
      <section id="tabel" class="about section-padding">
          <div class="container">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Stok Rempah</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                <!-- Tombol Berwarna Kuning yang ada di halaman web) -->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#tambah_komoditas">
                                <i class="fa fa-plus-square"></i> Tambah Stok
                                </button>
                                <br>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                        <!-- Tabel terdiri dari 4 kolom dan baris yang dinamis/berubah-ubah -->
                                        <thead>
                                            <tr>
                                                <th>Komoditas</th>
                                                <th>Stok (Ton)</th>
                                                <th>Harga (per kg)</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>                                   
                                        <tbody>
                                            <?php
                                                $query = mysqli_query($con, "SELECT * FROM komoditas JOIN gizi ON komoditas.idbarang = gizi.id");
                                                while($data=mysqli_fetch_array($query)){
                                                $komoditas = $data['komoditas'];
                                                $harga = $data['harga'];
                                                $stok = $data['stok'];
                                                $idbarang = $data['idbarang'];
                                                $sajian = $data['sajian'];
                                                $kalori = $data['kalori'];
                                                $lemak = $data['lemak'];
                                                $karbohidrat = $data['karbohidrat'];
                                                $protein = $data['protein'];
                                            ?>
                                            <tr>
                                                <td>
                                                <p><?=$komoditas;?></p>
                                                </td>
                                                <td>
                                                <p><?=$stok;?></p>
                                                </td>
                                                <td>Rp<?=$harga;?>
                                                </td>
                                                <td>
                                                <!-- Tombol Berwarna Kuning yang ada di halaman web ) -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idbarang;?>">
                                                    Ubah
                                                </button>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#info<?=$idbarang;?>">Info
                                                </button>
                                                </td>
                                            </tr>
                                                <!-- Dibawah ini adalah modal untuk mengubah komoditas yang sudah ada  --> 
                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="edit<?=$idbarang;?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                    
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Edit</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                        <div class="modal-body">
                                                        <label for="komoditas">Komoditas </label>
                                                        <input type="text" name="komoditas" value="<?=$komoditas;?>" class="form-control">
                                                        <br>
                                                        <label for="stok">Penambahan/Pengurangan Stok (<strong>Ton</strong>)</label>
                                                        <input type="number" name="stoktambah" placeholder="0" class="form-control">
                                                        <br>
                                                        <label for="harga">Perubahan Harga (<strong>Rupiah</strong>)</label>
                                                        <input type="number" name="harga" value="<?=$harga;?>" class="form-control">
                                                        <br>
                                                          <label for="importdomestik">Asal Komoditas</label>
                                                          <select class="form-control" name="importdomestik">
                                                            <option>Domestik</option>
                                                            <option>Impor</option>
                                                          </select>
                                                        <br>
                                                        <input type="hidden" name="idbarang" value="<?=$idbarang;?>">   
                                                        <button type="submit" class="btn btn-primary" name="edit_komoditas">Submit</button>
                                                        <?php if ($sajian == 0 && $kalori == 0 && $protein == 0 && $karbohidrat == 0 && $lemak == 0): ?>
                                                        <?php else: ?>
                                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_gizi<?=$idbarang;?>">
                                                                Ubah Nilai Gizi</button>
                                                        <?php endif; ?>
                                                        <button type="submit" class="btn btn-danger" name="del_komoditas">Hapus Komoditas Ini</button>
                                                        </div>
                                                        </form>           
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="info<?=$idbarang;?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h1 class="modal-title"><?=$komoditas;?></h1>
                                                            </div>
                                                            <!-- Modal Body -->
                                                            <div class="modal-body">
                                                                <?php if ($sajian == 0 && $kalori == 0 && $protein == 0 && $karbohidrat == 0 && $lemak == 0): ?>
                                                                  <br>
                                                                  <p>Informasi gizi mengenai <strong><?=$komoditas;?></strong> masih belum lengkap.</p>
                                                                  <br>
                                                                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_gizi<?=$idbarang;?>">
                                                                  Tambahkan</button>
                                                                <?php else: ?>
                                                                  <p>Takaran per saji <strong><?= $sajian; ?>g</strong></p>
                                                                  <p><strong>Kalori:</strong> <?= $kalori; ?> kkal</p>
                                                                  <p><strong>Protein:</strong> <?= $protein; ?>g</p>
                                                                  <p><strong>Karbohidrat:</strong> <?= $karbohidrat; ?>g</p>
                                                                  <p><strong>Lemak:</strong> <?= $lemak; ?>g</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Dibawah ini adalah modal untuk menambahkan informasi gizi komoditas  -->  
                                                <div class="modal fade" id="edit_gizi<?=$idbarang;?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Informasi nilai gizi untuk <?=$komoditas;?></h4>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                        <div class="modal-body">
                                                        <p><em>Dalam takaran saji per  </em><input type="number" name="sajian" value="100" class="input-pendek"><strong>  g</strong></p>
                                                        <label for="kalori">Kalori (<strong>kkal</strong>) </label>
                                                        <input type="number" name="kalori" placeholder="contoh: 17" class="form-control">
                                                        <br>
                                                        <label for="lemak">Lemak (<strong>g</strong>)</label>
                                                        <input type="number" name="lemak" placeholder="contoh: 7" class="form-control">
                                                        <br>
                                                        <label for="karbohidrat">Karbohidrat (<strong>g</strong>)</label>
                                                        <input type="number" name="karbohidrat" placeholder="contoh: 42" class="form-control">
                                                        <br>
                                                        <label for="protein">Protein (<strong>g</strong>)</label>
                                                        <input type="number" name="protein"  placeholder="contoh: 39" class="form-control">
                                                        <br>
                                                        <input type="hidden" name="idbarang" value="<?=$idbarang;?>">   
                                                        <button type="submit" class="btn btn-primary" name="edit_gizi">Submit</button>
                                                        </div>
                                                        </form>           
                                                    </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
          </div>
        <!-- Dibawah ini adalah modal untuk menambahkan jenis komoditas baru  -->  
        <div class="modal fade" id="tambah_komoditas">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <!-- Modal Header -->
              <div class="modal-header">
              <h4 class="modal-title">Tambah Komoditas Baru</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                                            
              <!-- Modal body -->
              <form method="post">
              <div class="modal-body">
              <input type="text" name="komoditas" placeholder="Komoditas" class="form-control" required>
              <br>
              <input type="hidden" name="idbarang">
              <button type="submit" class="btn btn-primary" name="tambah_komoditas">Submit</button>
              </div>
              </form>   
            </div>
          </div>
        </div>
      </section>
      <!-- section Ends -->
      <footer>
        <p>Made with &#128150; by <a id="detrux" href="https://github.com/de-trux" target="_blank">de-trux</a></p>
        <audio id="clickSound" src="_assets/ayylmao.mp3"></audio>
      </footer>
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <!-- JavaScript untuk menyembunyikan modal sebelumnya pada saat tombol "edit_gizi$idbarang" ditekan -->
    <script>
        $(document).ready(function() {
            <?php
            $query = mysqli_query($con, "SELECT * FROM komoditas JOIN gizi ON komoditas.idbarang = gizi.id");
            while ($data = mysqli_fetch_array($query)) {
                $idbarang = $data['idbarang'];
            ?>
                $('#edit_gizi<?=$idbarang;?>').on('show.bs.modal', function() {
                    $('#info<?=$idbarang;?>').modal('hide');
                    $('#edit<?=$idbarang;?>').modal('hide');
                });
            <?php
            }
            ?>
        });
    </script>
</body>
</html>