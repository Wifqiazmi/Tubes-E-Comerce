<?php
@include 'config.php';


if (isset($_POST['order_btn'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $method = $_POST['method'];
    $delivery = $_POST['delivery'];
    $flat = $_POST['flat'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pin_code = $_POST['pin_code'];

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
    $price_total = 0;
    $product_name = [];
    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ') ';
            $product_price = $product_item['price'] * $product_item['quantity'];
            $price_total += $product_price;
        }
    }

    

    $total_product = implode(', ', $product_name);

    // Pastikan kolom yang dimasukkan sesuai dengan tabel orders
    $detail_query = mysqli_query($conn, "INSERT INTO `orders` (name, number, method, flat, city, state, delivery, pin_code, total_products, total_price) VALUES ('$name','$number','$method','$flat','$city','$state','$delivery','$pin_code','$total_product','$price_total')") or die(mysqli_error($conn));

    if ($cart_query && $detail_query) {
        // Hapus semua item dari keranjang setelah pesanan berhasil
        mysqli_query($conn, "DELETE FROM `cart`");

        echo "
        <div class='order-message-container'>
        <div class='message-container'>
            <h3>Pesanan Telah Dibuat</h3>
            <div class='order-detail'>
                <span>" . $total_product . "</span>
                <span class='total'> total : Rp " . $price_total . "0  </span>
            </div>
            <div class='customer-details'>
                <p> Nama : <span>" . $name . "</span> </p>
                <p> No Telepon : <span>" . $number . "</span> </p>
                <p> Alamat Pengiriman : <span>" . $flat . "</span> </p>
                <p> Provinsi : <span>" . $state . "</span> </p>
                <p> Kota : <span>" . $city . "</span> </p>
                <p> Pengiriman : <span>" . $delivery . "</span> </p>
                <p> Metode Pembayaran : <span>" . $method . "</span> </p>
            </div>
                <a href='index.php' class='btn'>kembali ke beranda</a>
            </div>
        </div>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="CSS/style.css">

</head>

<body>

    <div class="container">

        <section class="checkout-form">

            <h1 class="heading">checkout</h1>

            <form action="" method="post">

                <div class="display-order">
                    <?php
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                    $total = 0;
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity'], 2);
                            $grand_total += $fetch_cart['price'] * $fetch_cart['quantity'];
                    ?>
                            <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                    <?php
                        }
                    } else {
                        echo "<div class='display-order'><span>your cart is empty!</span></div>";
                    }
                    ?>
                    <span class="grand-total"> total harga : Rp <?= number_format($grand_total, 2); ?>0 </span>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Nama Lengkap</span>
                        <input type="text" placeholder="nama lengkap anda" name="name" required>
                    </div>
                    <div class="inputBox">
                        <span>Nomor Telepon</span>
                        <input type="number" placeholder="nomor telepon anda" name="number" required>
                    </div>
                    <div class="inputBox">
                        <span>Alamat pengiriman</span>
                        <input type="text" placeholder="Nama Jalan, No. Rumah" name="flat" required>
                    </div>
                    <div class="inputBox">
                        <span>Opsi Pengiriman</span>
                        <select name="delivery">
                            <option value="JNE" selected>JNE</option>
                            <option value="J&T">J&T</option>
                            <option value="Ninja Express">Ninja Express</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Provinsi</span>
                        <input type="text" placeholder="" name="state" required>
                    </div>
                    <div class="inputBox">
                        <span>Kota</span>
                        <input type="text" placeholder="" name="city" required>
                    </div>
                    <div class="inputBox">
                        <span>Kode Pos</span>
                        <input type="text" placeholder="123456" name="pin_code" required>
                    </div>
                    <div class="inputBox">
                        <span>Metode pembayaran</span>
                        <select name="method">
                            <option value="cash on delivery" selected>cash on delivery</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                            <option value="E-wallet">E-wallet</option>
                            <option value="Kartu Kredit/Debit">Kartu Kredit/Debit</option>
                        </select>
                    </div>
                </div>

                <input type="submit" value="Buat Pesanan" name="order_btn" class="btn">
            </form>

        </section>

    </div>

</body>

</html>
