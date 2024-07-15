<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <table>
        <form action="add.php" method="POST">
        <div class="container mt-5">
        <h1 class="text-center">Tambahkan Customer</h1>
        <form action="add.php" method="POST">
        <div class="mb-3">
                <label for="txt_nama" class="form-label">ID Customer</label>
                <input type="text" class="form-control" id="txt_nama" name="txt_CustomerID" required>
            </div>
            <div class="mb-3">
                <label for="txt_nama" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" id="txt_nama" name="txt_nama" required>
            </div>
            <div class="mb-3">
                <label for="txt_harga" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="txt_harga" name="txt_Alamat" required>
            </div>
            <div class="mb-3">
                <label for="txt_stock" class="form-label">NoTelpon</label>
                <input type="text" class="form-control" id="txt_stock" name="txt_NoTelpon" required>
            </div>
            <div class="mb-3">
            <button type="submit" name="btn_simpan" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-warning">Reset</button>
            <a href="customer.php" class="btn btn-primary">Back</a>
        </form>
    </div>

    </table>

    
    <?php
if(isset($_POST['btn_simpan'])){
    $CustomerID = $_POST['txt_CustomerID'];
    $Name = $_POST['txt_nama'];
    $Address = $_POST['txt_Alamat'];
    $Phone = $_POST['txt_NoTelpon'];

    include_once("config.php");

    $query = "INSERT INTO customer (CustomerID, Name, Address, Phone) VALUES ('$CustomerID', '$Name', '$Address', '$Phone')";
    $result = mysqli_query($mysqli, $query);
    
    if($result){
        echo "Customer sukses ditambahkan";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($mysqli);
    }
}
?>
</body>
</html>