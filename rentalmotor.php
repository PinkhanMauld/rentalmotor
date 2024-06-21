<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
<body>
 
            <h2>Pendaftaran Rental</h2>
            <form action="" method="post">
                <label for="nama">Nama Pelanggan</label>
                <input type="text" name="nama" id="nama">
                <br>
                <label for="durasi">Lama Waktu Rental (per hari)</label>
                <input type="number" name="durasi" id="durasi">
                <br>
                <label for="jenis">Jenis Motor: </label>
                <select name="jenis" id="jenis">
                    <option value="Scooter">Scooter</option>
                    <option value="Matic">Matic</option>
                    <option value="Bebek">Bebek</option>
                    <option value="Trail">Trail</option>
                </select>
                <br>
    
                <input type="submit" name="submit">
            </form>
      
            <?php
                class RentalMotor {
                    protected $durasi, $ppn = 10000, $harga, $diskon = 0.5;
                    protected $Scooter = 70000;
                    protected $Matic = 60000;
                    protected $Bebek = 50000;
                    protected $Trail = 40000;
                    protected $namaMember = [  
                        "Agung", "Joni", "Deli"
                    ];
                    
                    public function setCetakMember($harga, $durasi, $diskon){
                        $total = $harga * $durasi + $this->ppn;
                        $totalDiskon = $total * $diskon;
                        $totalBayar = $total - $totalDiskon;
                        echo "Jenis motor yang dirental adalah " . "<b>" . $_POST['jenis'] . " </b>selama <b>" . $_POST['durasi'] . " hari. </b>" . "<br>";
                        echo "Harga rental per-harinya: <b> Rp. " . number_format($harga, 2, ',', '.') . "</b>" . "<br>";
                        echo "Total yang harus dibayar: " . "<b> Rp. " . number_format($totalBayar, 2, ',', '.') . "</b>" . "<br>";
                    }   

                    public function setCetak($harga, $durasi){
                        $total = $harga * $durasi + $this->ppn;
                        echo "Jenis motor yang dirental adalah " . "<b>" . $_POST['jenis'] . " </b>selama <b>" . $_POST['durasi'] . " hari. </b></p>" . "<br>";
                        echo "Harga rental per-harinya: <b> Rp. " . number_format($harga, 2, ',', '.') . "</b>" . "<br>";
                        echo "Total yang harus dibayar: " . "<b> Rp. " . number_format($total, 2, ',', '.') . "</b>" . "<br>";
                    }   
                    
                    
                    public function getCetak(){
                        if(isset($_POST['submit'])) {
                            $nama = $_POST['nama'];
                            $durasi = $_POST['durasi'];
                            $jenisMotor = $_POST['jenis'];
                            
                            if((empty($nama)) || (empty($durasi)) || (empty($jenisMotor))) {
                                echo "Masukan nilai data terlebih dahulu dengan lengkap";
                            } else {
                                $hasil = new RentalMotor();
                                
                                if($jenisMotor == 'Scooter'){
                                    $harga = $hasil->Scooter;
                                } else if ($jenisMotor == 'Matic'){
                                    $harga = $hasil->Matic;
                                } else if ($jenisMotor == 'Bebek'){
                                    $harga = $hasil->Bebek;
                                } else if ($jenisMotor == 'Trail'){
                                    $harga = $hasil->Trail;
                                } 
                                
                                if(in_array($nama, $hasil->namaMember)){
                                    $diskon = 0.05;
                                    echo "Anda berstatus sebagai Member mendapatkan diskon <b>Member sebesar 5%.</b><br>";
                                    $hasil->setCetakMember($harga, $durasi, $diskon);
                                } else {
                                    $hasil->setCetak($harga, $durasi);
                                }
                                
                            }     
                        }
                    }
                }
                
                $hitung = new RentalMotor();
                $hitung->getCetak();
            ?>
   
    
   
</body>
</html>