<?php

class DataBahanBakar {
    private $hargaPertalite;
    private $hargaPertamax;
    private $hargaPertamaxTurbo;
    private $hargaPertaminaDex;

    public $jenisYangDipilih;
    public $totalLiter;
    protected $totalPembayaran;

    public function __construct($hargaPertalite, $hargaPertamax, $hargaPertamaxTurbo, $hargaPertaminaDex) {
        $this->hargaPertalite = $hargaPertalite;
        $this->hargaPertamax = $hargaPertamax;
        $this->hargaPertamaxTurbo = $hargaPertamaxTurbo;
        $this->hargaPertaminaDex = $hargaPertaminaDex;
    }

    public function getHarga() {
        $hargaBahanBakar = [
            "pertalite" => $this->hargaPertalite,
            "pertamax" => $this->hargaPertamax,
            "pertamax_turbo" => $this->hargaPertamaxTurbo,
            "pertamina_dex" => $this->hargaPertaminaDex
        ];
        return $hargaBahanBakar;
    }
}

class Pembelian extends DataBahanBakar {
    public function totalHarga() {
        $harga = $this->getHarga();
        $this->totalPembayaran = $harga[$this->jenisYangDipilih] * $this->totalLiter;
    }

    public function cetakBukti() {
        $ppn = 10 / 100 * $this->totalPembayaran;
        $totalBayar = $this->totalPembayaran + $ppn;

        echo "<h2>Bukti Transaksi</h2>";
        echo "<p>-------------------------------------------------------------------------------------</p>";
        echo "<p>Anda membeli bahan bakar minyak tipe <strong>" . ucwords(str_replace('_', ' ', $this->jenisYangDipilih)) . "</strong></p>";
        echo "<p>Dengan Jumlah: <strong>" . $this->totalLiter . " Liter</strong></p>";
        echo "<p>Total : Rp. <strong>" . number_format($this->totalPembayaran, 0, ',', '.') . "</strong></p>";
        echo "<p>Tambahan Lainnya PPN Sebesar 10%: Rp. " . number_format($ppn, 0, ',', '.') . "</p>";
        echo "<p>Total yang harus Anda bayar Rp. <strong>" . number_format($totalBayar, 0, ',', '.') . "</strong></p>";
        echo "<p>-------------------------------------------------------------------------------------</p>";
    }
}
?>
