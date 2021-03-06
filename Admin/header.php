<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket"></i> Organic India
            </h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="#" class="nav-item nav-link active">
                    <p class="cart">
                        <?php
                        if (isset($_SESSION['admin'])) {
                            $conn = new mysqli("localhost", "root", "RishabhB@7130R", "Organic_India");
                            if ($conn->connect_error) {
                                die("Connection to Mysql failed");
                            }
                            $res = $conn->query("SELECT * FROM admins WHERE id=" . $_SESSION['admin']);
                            $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
                            echo '<span id="cart_count" class="text-warning bg-light">' . $userRow['name'] . '</span>';
                        } else {
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </p>
                </a>
                
                <a href="./Login/logout.php?logout" class="nav-item nav-link active">
                    <h5 class=" cart">
                        <span class="glyphicon glyphicon-log-out"></span>Logout
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>