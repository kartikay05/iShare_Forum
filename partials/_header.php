<?php
session_start();

echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/Forum">iShare</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Forum">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">Top Categories</a>
                    <ul class="dropdown-menu">';

$sql = "SELECT category_name, category_id FROM `categories` LIMIT 4";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo '<li><a class="dropdown-item" href="threadlist.php?catid=' . $row['category_id'] . '">' . htmlspecialchars($row['category_name']) . '</a></li>';
}

echo '
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>

            <div class="d-flex align-items-center ms-auto">';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '
                <form class="d-flex me-3 m-0" role="search" method="get" action="search.php">
                    <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
                <span class="text-light me-3">Welcome, <strong>' . htmlspecialchars($_SESSION['useremail']) . '</strong></span>
                <a href="partials/_logout.php" class="btn btn-sm btn-outline-warning">Logout</a>';
} else {
    echo '
                <form class="d-flex me-2 m-0" role="search" method="get" action="search.php">
                    <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
                <button class="btn btn-sm btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
}

echo '
            </div>
        </div>
    </div>
</nav>';

include '_loginModal.php';
include '_signupModal.php';

// Alerts
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show mb-0 text-center" role="alert">
            <strong>Success!</strong> You can now login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}

if (isset($_GET['error']) || (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] != "true")) {
    echo '<div class="alert alert-danger alert-dismissible fade show mb-0 text-center" role="alert">
            <strong>Oops!</strong> ' . htmlspecialchars($_GET['error']) . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
?>