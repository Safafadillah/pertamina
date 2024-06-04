<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pertamina</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="m1">
    <img src="logo1.png" alt="gambar">
    <form action="" method="post">
      <label for="jumlah_liter">Masukan Jumlah Liter</label>
      <input type="number" id="jumlah_liter" name="jumlah_liter" min="1" required>
      <br>

      <label for="tipe_bensin">Pilih Tipe Bahan Bakar:</label>
      <select name="tipe_bensin" id="tipe_bensin" required>
        <option hidden>Pilih Bahan Bakar</option>
        <option value="pertalite">Pertalite</option>
        <option value="pertamax">Pertamax</option>
        <option value="pertamax_turbo">Pertamax Turbo</option>
        <option value="pertamina_dex">Pertamina Dex</option>
      </select>
      <br><br>
      <button type="submit">Beli</button>
    </form>

    <div class="m2">
      <?php
      require_once 'DataBahanBakar.php';


      $bahanBakar = new Pembelian(10000, 12950, 14400, 15100);
      
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $bahanBakar->jenisYangDipilih = $_POST['tipe_bensin'];
          $bahanBakar->totalLiter = $_POST['jumlah_liter'];
          $bahanBakar->totalHarga();
      }

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bahanBakar->cetakBukti();
      }

      ?>
    </div>
  </div>
</body>
</html>

