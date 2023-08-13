
<html>
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <!-- Logo -->
                <a href="index.php" class="navbar-brand">Smart Store</a>
                <!-- button toggler -->
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navmenu">
                    <!---left -->
                    <div class="navbar-nav">
                        <a href="Cart.php" class="nav-link">Cart</a>
                        <a href="allproduct.php" class="nav-link">All Product</a>

                        <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> Categories</a>
                            <div class ="dropdown-menu"> 
                                <a href="#" class="dropdown-item">Xiaomi</a>
                                <a href="#" class="dropdown-item">Samsung</a>
                                <a href="#" class="dropdown-item">Iphone</a>
                                
                            </div>
                        </div>
                    </div>  
                    <?php
                        if(isset($_COOKIE['cc_usr'])){
                    ?>
                    <!-- Right -->
                    <div class="navbar-nav ms-auto">
                        <a href="#" class="nav-link">Welcome,
                            <?=$_COOKIE['cc_usr']?>
                    </a>
                        <a href="Logout.php" class="nav-link">Logout</a>
                    </div>
                        <?php
                    }else{
                            ?>
                    <!-- Right -->
                    <div class="navbar-nav ms-auto">
                        <a href="Login.php" class="nav-link">Login</a>
                        <a href="Register.php" class="nav-link">Register</a>
                    </div>
                    <?php
                        }
                            ?>
                </div>
            </div>
        </nav>