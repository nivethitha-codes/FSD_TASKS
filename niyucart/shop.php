<?php
include "includes/header.php";
include "includes/db.php";

// Fetch products from database (or hardcode if you prefer)
$products = [
    ['name'=>'Wireless Headphones','price'=>49.99,'image'=>'headphones.jpg'],
    ['name'=>'Smart Watch','price'=>99.99,'image'=>'smartwatch.jpg'],
    ['name'=>'Gaming Mouse','price'=>29.99,'image'=>'gamingmouse.jpg'],
    ['name'=>'Bluetooth Speaker','price'=>39.99,'image'=>'bluetoothspeaker.jpg'],
    ['name'=>'Leather Wallet','price'=>25.00,'image'=>'wallet.jpg'],
    ['name'=>'Sunglasses','price'=>15.99,'image'=>'sunglasses.jpg'],
    ['name'=>'Backpack','price'=>49.99,'image'=>'backpack.jpg'],
    ['name'=>'Running Shoes','price'=>79.99,'image'=>'runningshoes.jpg'],
    ['name'=>'Casual Sneakers','price'=>59.99,'image'=>'casualsneakers.jpg'],
    ['name'=>'Formal Shoes','price'=>89.99,'image'=>'formalshoes.jpg'],
    ['name'=>'Coffee Mug','price'=>9.99,'image'=>'coffeemug.jpg'],
    ['name'=>'Desk Lamp','price'=>19.99,'image'=>'desklamp.jpg'],
    ['name'=>'Notebook','price'=>4.99,'image'=>'notebook.jpg'],
    ['name'=>'Pen Set','price'=>6.99,'image'=>'penset.jpg'],
    ['name'=>'T-Shirt','price'=>14.99,'image'=>'tshirt.jpg'],
    ['name'=>'Hoodie','price'=>29.99,'image'=>'hoodie.jpg'],
    ['name'=>'Jeans','price'=>39.99,'image'=>'jeans.jpg'],
    ['name'=>'Water Bottle','price'=>12.99,'image'=>'waterbottle.jpg'],
    ['name'=>'Wireless Charger','price'=>24.99,'image'=>'wirelesscharger.jpg'],
    ['name'=>'Tablet','price'=>199.99,'image'=>'tablet.jpg'],
];
?>

<h2 class="title">Shop Our Products</h2>

<div class="products">
<?php foreach($products as $product){ ?>
    <div class="card">
        <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        <h3><?php echo $product['name']; ?></h3>
        <p>₹<?php echo number_format($product['price'],2); ?></p>
        <a href="add_to_cart.php?product=<?php echo urlencode($product['name']); ?>" class="btn">Add to Cart</a>
    </div>
<?php } ?>
</div>

<?php include "includes/footer.php"; ?>