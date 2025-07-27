<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Welcome to iShare - Coding Forums</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon/apple-touch-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon/favicon-16x16.png" type="image/x-icon">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/cs/style.css">
</head>

<body>
    <?php include 'partials/_conn.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <div class="container my-4">
        <h2 class="mb-4">Search Results for: <em><?= htmlspecialchars($_GET["query"]); ?></em></h2>

        <?php
        $noresults = true;
        $query = $_GET["query"];
        $sql = "SELECT * FROM threads WHERE MATCH (thread_title, thread_desc) AGAINST ('$query')";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $title = htmlspecialchars($row['thread_title']);
            $desc = htmlspecialchars($row['thread_desc']);
            $thread_id = $row['thread_id'];
            $url = "thread.php?threadid=" . $thread_id;
            $noresults = false;

            echo '
            <div class="result mb-4">
                <h4><a href="' . $url . '" class="text-dark">' . $title . '</a></h4>
                <p>' . $desc . '</p>
            </div>';
        }

        if ($noresults) {
            echo '
            <div class="jumbotron jumbotron-fluid bg-light">
                <div class="container">
                    <h1 class="display-4">No Results Found</h1>
                    <p class="lead">Suggestions:</p>
                    <ul>
                        <li>Make sure that all words are spelled correctly.</li>
                        <li>Try different keywords.</li>
                        <li>Try more general keywords.</li>
                    </ul>
                </div>
            </div>';
        }
        ?>
    </div>

    <?php include 'partials/_footer.php'; ?>

    <!-- JS: jQuery, Popper.js, Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>

</html>
