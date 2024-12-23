<?php
require_once("product_controller.php");

// Fetch all products
$products = get_allproduct();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        /* Fixed Top Navigation Bar */
        .navbar {
            background-color: #004080;
            color: white;
        }

        .navbar .nav-link {
            color: white;
        }

        .navbar .nav-link:hover {
            color: #cce5ff;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .btn-custom {
            background-color: #0056b3;
            color: white;
        }

        .btn-custom:hover {
            background-color: #004080;
            color: white;
        }

        /* Product Cards */
        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-card .card-body {
            padding: 10px;
        }

        .product-card .product-name {
            font-weight: bold;
            font-size: 1.1rem;
            color: #004080;
        }

        .product-card .product-price {
            color: #28a745;
            font-size: 1rem;
            font-weight: bold;
        }

        footer {
            margin-top: 60%;
            background-color: #004080;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Fixed Top Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Shopify</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../ecommerceproject/login/register.php">Sell with Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light btn-sm ms-2" href="../ecommerceproject/login/customer_login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light btn-sm ms-2" href="../ecommerceproject/login/customer_register.php">Register</a>
                    </li>
                </ul>
                <form class="d-flex ms-3">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5 pt-4">
        <h2 class="text-center my-4">Explore Our Products</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            if (!empty($products)) {
                foreach ($products as $product) {
                    ?>
                    <div class="col">
                        <div class="card product-card">
                            <img src="product_images/<?php echo htmlspecialchars($product['img']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <div class="card-body">
                                <h5 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h5>
                                <p class="product-price">$<?php echo number_format($product['price'], 2); ?></p>
                                <a href="../ecommerceproject/login/customer_login.php" class="btn btn-custom btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-muted text-center'>No products available at the moment.</p>";
            }
            ?>
        </div>
    </div>


    <footer>
        <p>&copy; 2024 Shopify. All rights reserved.</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
