<?php
// connect ke database "rempah"
$con = mysqli_connect("localhost","root","","rempah");

// Button untuk menambah komoditas
if (isset($_POST['tambah_komoditas'])) {
    $komoditas = $_POST['komoditas'];

    $con->begin_transaction();

    try {
        $addtokomoditas = "INSERT INTO komoditas (komoditas) VALUES ('$komoditas')";
        $con->query($addtokomoditas);

        $idbarang = mysqli_insert_id($con);
        //NOTE : value "id" di tabel gizi akan selalu sama dengan value "idbarang" milik tabel komoditas

        $addtogizi = "INSERT INTO gizi (id, komoditas) VALUES ('$idbarang', '$komoditas')";
        $con->query($addtogizi);

        $con->commit();

        header('location:index.php');
    } catch (Exception $e) {
        $con->rollback();
        echo 'Gagal: ' . $e->getMessage();
    }
};

// Button untuk edit komoditas
if (isset($_POST['edit_komoditas'])) {

    $id = $_POST['idbarang'];
    $komoditas = $_POST['komoditas'];
    $harga = $_POST['harga'];
    $stoktambah = $_POST['stoktambah'];

    $con->begin_transaction();

    try {
        // Mengubah nilai value, mengubah "Komoditas" dan "Perubahan Harga" di modal tombol "Ubah"
        $update = "UPDATE komoditas SET komoditas = '$komoditas', harga = '$harga' WHERE idbarang='$id'";
        $con->query($update);

        // Menambah nilai value, menambah nilai Stok di modal tombol "Ubah"
        $tambah = "UPDATE komoditas SET stok =  stok + '$stoktambah' WHERE idbarang='$id'";
        $con->query($tambah);

        // Eksekusi kedua operasi jika sukses
        $con->commit();
        echo "Edit Sukses";
    } catch (Exception $e) {
        // Gagalkan operasi jika salah satu gagal
        $con->rollback();
        echo "Edit Gagal: " . $e->getMessage();
    }
}

// Button untuk delete komoditas
if(isset($_POST['del_komoditas'])){
    $id = $_POST['idbarang'];

    $con->begin_transaction();
    try {
        // delete komoditas value
        $del = "DELETE FROM komoditas WHERE idbarang='$id';";
        $con->query($del);

        // delete gizi value
        $del1 = "DELETE FROM gizi WHERE id='$id';";
        $con->query($del1);

        // Eksekusi kedua operasi jika sukses
        $con->commit();
        echo "Edit Sukses";
    } catch (Exception $e) {
        // Gagalkan operasi jika salah satu gagal
        $con->rollback();
        echo "Edit Gagal: " . $e->getMessage();
    }
};

// Button untuk edit informasi nilai gizi
if (isset($_POST['edit_gizi'])) {

    $id = $_POST['idbarang'];
    $sajian = $_POST['sajian'];
    $kalori = $_POST['kalori'];
    $lemak = $_POST['lemak'];
    $karbohidrat = $_POST['karbohidrat'];
    $protein = $_POST['protein'];

    $update_gizi = "UPDATE gizi SET kalori = '$kalori', lemak = '$lemak', karbohidrat = '$karbohidrat', protein = '$protein', sajian = '$sajian' WHERE id='$id'";

    if ($con->query($update_gizi) === true) {
        echo "Column value updated successfully.";
    } else {
        echo "Error updating column value: " . $con->error;
    }
}

?>