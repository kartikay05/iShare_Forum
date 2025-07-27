<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iShare Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link rel="shortcut icon" href="assets/images/favicon/apple-touch-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/cs/style.css">
</head>

<body>
    <?php include 'partials/_conn.php' ?>
    <?php include 'partials/_header.php' ?>


    <!-- Slider starts here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner custom-carousel-height">
            <div class="carousel-item active">
                <img src="assets/images/img/img1.jpg" class="d-block w-100 custom-carousel-img" alt="img1">
            </div>
            <div class="carousel-item">
                <img src="assets/images/img/img1.jpg" class="d-block w-100 custom-carousel-img" alt="img2">
            </div>
            <div class="carousel-item">
                <img src="assets/images/img/img1.jpg" class="d-block w-100 custom-carousel-img" alt="img3">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Category container starts here -->
    <div class="container my-4" id="ques">
        <h2 class="text-center my-4">iShare - Browse Categories</h2>
        <div class="row">
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['category_id'];
                $cat = $row['category_name'];
                $desc = $row['category_description'];
                echo '
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGxhcHRvcHxlbnwwfDB8MHx8fDA%3D" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><a href="threadlist.php?catid=' . $id . '">' . $cat . '</a></h5>
                        <p class="card-text flex-grow-1">' . substr($desc, 0, 100) . '...</p>
                        <a href="threadlist.php?catid=' . $id . '" class="btn btn-primary mt-2">View Threads</a>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
    </div>


    <?php include 'partials/_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>