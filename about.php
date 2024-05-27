<?php include "php/functions.php"; ?>

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
            <div class="section-title">Products Categories</div>
            <?php $categories = getCategories() ?>
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
            
            <?php $products_2 = getAboutProducts(8) ?>
            <div class="product">
                <?php
                    foreach ($products_2 as $product) {
                        ?>
                            <div class="product-left">
                                <img src="products/<?php echo $product['image'] ?>" alt="">
                            </div>
                            <div class="product-right">
                                <p class="title">
                                    <a href="product.php?id=<?php echo urlencode ($product['title']) ?>">
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
