<?php require "php/functions.php" ?>
<?php
    if (isset($_GET['category'])) {
        $category = urldecode($_GET['category']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="description" content="My Shop">
    <meta name="keywords" content="books, phones, games, electronics">
    <link rel="stylesheet" href="css/styles.css">
    <title>My Shop</title>
</head>
<body>

    <?php include "includes/header.php"; ?>
    <?php include "includes/nav.php"; ?>
    

    <main>
        <div class="left">
            
            <?php $categories = getProductsByCategory($cat) ?>
            <?php
                foreach ($categories as $category) {
                    ?>
                        <a href="category.php?category=<?php echo urlencode ($category['category']) ?>
                            <?php echo ucfirst($category['category']) ?>

                        </a>
                    <?php
                }
            ?>

        </div>
        <div class="right">
            <div class="section-title">Products in the <?php echo ucfirst($cat) ?> </div>
            <?php $products = getHomePageProducts(4) ?>
            <div class="product">
                <?php
                    foreach ($products as $product) {
                        ?>
                            <div class="product-left">
                                <img src="products/<?php echo $product['image'] ?>" alt="">
                            </div>
                            <div class="product-right">
                                <p class="title">
                                    <a href="product.php?id=<?php echo  urldecode ($product['title']) ?>">
                                        <?php echo $product['title'] ?>
                                    </a>
                                </p>
                                <p class="description">
                                    <?php echo $product['description'] ?>
                                </p>
                                <p class="price">
                                    <?php echo $product['price'] ?>
                                </p>
                            </div>
                        <?php
                    }
                ?> 
        </div>
    </main>

    <?php include "includes/footer.php"; ?>


    <script src="javascript/javascrpit.js"></script>
</body>
</html>
