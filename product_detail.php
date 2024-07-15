<?php
@include 'config.php';

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE `id` = $product_id");
    $fetch_product = mysqli_fetch_assoc($select_product);

    // tambahkan produk ke keranjang
    $product_name = $fetch_product['name'];
    $product_price = $fetch_product['price'];
    $product_image = $fetch_product['image'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'ditambahkan ke keranjang';
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
        $message[] = 'produk berhasil ditambahkan';
    }
}

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'ditambahkan ke keranjang';
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
        $message[] = 'produk berhasil ditambahkan';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <?php if (isset($fetch_product) && !empty($fetch_product)) { ?>
                <div class="col-md-6">
                    <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" class="img-fluid" alt="...">
                </div>
                <div class="col-md-6">
                    <h1><?php echo $fetch_product['name']; ?></h1>
                    <h3>Harga: Rp. <?php echo $fetch_product['price']; ?>0</h3>
                    <?php if (array_key_exists('description', $fetch_product)) { ?>
                        <h5>Deskripsi produk: </h5>
                        <p><?php echo $fetch_product['description']; ?></p>
                    <?php } else { ?>
                        <p>Deskripsi tidak tersedia.</p>
                    <?php } ?>
                    <div class="product-description">
                    <h5>Keunggulan produk</h5>
                        <ul>
                            <li>✔️ BAHAN POLYESTER</li>
                            <li>✔️ KETEBALAN 145 GRAMASI</li>
                            <li>✔️ PRODUK ASLI 100% COTTON COMBED 30S</li>
                        </ul>
                        <h5>Tersedia size</h5>
                        <ul>
                            <li>S = Lebar 47 cm, Panjang 66cm</li>
                            <li>M = Lebar 48 cm, Panjang 68cm</li>
                            <li>L = Lebar 50 cm, Panjang 70 cm</li>
                            <li>XL = Lebar 52 cm, Panjang 72 cm</li>
                        </ul>
                    </div>

                    <form action="" method="post">
                        <button type="submit" class="btn" name="add_to_cart" style="background-color: #e8492c; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Masukan Keranjang</button>
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <!-- Tautan untuk "Beli Sekarang" -->
                        <a href="checkout.php?action=buy_now&product_id=<?php echo $fetch_product['id']; ?>" class="btn btn-success">Checkout Sekarang</a>
                    </form>
                </div>
            <?php } else { ?>
                <div class="col-md-12">
                    <p>Produk tidak ditemukan.</p>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>