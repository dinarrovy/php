<?php
require_once 'database.php';


class Contacts {
    private static $koneksi;

    public static function setKoneksi($koneksi) {
        self::$koneksi = $koneksi;
    }

    static function select(){
        $query = "SELECT * FROM contacts";
        $result = mysqli_query(self::$koneksi, $query);
        return $result;
    }
    static function insert($no_telepon,$nama,$alamat){
        $query = "INSERT INTO contacts (no_telepon,nama,alamat) VALUES (?, ?, ?)";
        $stmt = self::$koneksi->prepare($query);
        $stmt->bind_param("sss", $no_telepon,$nama,$alamat);
        $result = $stmt->execute();
        return $result;
    }
    
    static function update($id, $new_no_telepon, $new_nama, $new_alamat){
        $query = "UPDATE contacts SET no_telepon = ?, nama = ?, alamat = ? WHERE id_contacts = ?";
        $stmt = self::$koneksi->prepare($query);
        $stmt->bind_param("sssi", $new_no_telepon,$new_nama,$new_alamat,$id);
        $result = $stmt->execute();
        return $result;
    }
    static function delete($id){
        $query = "DELETE FROM contacts WHERE id_contacts = ?";
        $stmt = self::$koneksi->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        return $result;
    }
    
}
?>



