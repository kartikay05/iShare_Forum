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

    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        // Insert into thread db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);

        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);

        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your thread has been added! Please wait for community to respond.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';
        }
    }
    ?>


    <!-- Category container starts here -->
    <div class="container my-4">
        <div style="background-color: #b0b3b1ff; color: black;" class="p-5 mb-4 rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-4">Welcome to <?php echo $catname; ?> forums</h1>
                <p class="lead"><?php echo $catdesc; ?></p>
                <hr class="my-4">
                <p>
                    This is a peer-to-peer forum. No Spam / Advertising / Self-promote in the forums is allowed. Do not
                    post copyright-infringing material. Do not post “offensive” posts, links, or images. Do not cross
                    post
                    questions. Remain respectful of other members at all times.
                </p>
                <a class="btn btn-success btn-lg" href="https://en.wikipedia.org/wiki/Internet_forum" target="_blank"
                    role="button">Learn more</a>
            </div>
        </div>
    </div>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<div class="container">
            <h1 class="py-2">Start a Discussion</h1> 
            <form action="' . htmlspecialchars($_SERVER["REQUEST_URI"]) . '" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Problem Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" required>
                    <div id="titleHelp" class="form-text">Keep your title as short and crisp as possible</div>
                </div>
                <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
                <div class="mb-3">
                    <label for="desc" class="form-label">Elaborate Your Concern</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>';
    } else {
        echo '<div class="container">
            <h1 class="py-2">Start a Discussion</h1> 
            <p class="lead">
                You are not logged in. Please 
                <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">login</a> 
                to be able to start a Discussion.
            </p>
        </div>';
    }
    ?>


    <div class="container mb-5" id="ques">
        <h1 class="py-2">Browse Questions</h1>
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_time = $row['timestamp'];
            $thread_user_id = $row['thread_user_id'];

            $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            echo '<div class="d-flex align-items-start my-3">
            <img src="assets/images/img/boy.png" width="54" class="me-3" alt="...">
            <div>
                <h5 class="mt-0 mb-1">
                    <a class="text-dark" href="thread.php?threadid=' . $id . '">' . $title . '</a>
                </h5>
                ' . $desc . '
                <div class="fw-bold mt-2">Asked by: ' . $row2['user_email'] . ' at ' . $thread_time . '</div>
            </div>
        </div>';
        }
        if ($noResult) {
            echo '<div class="bg-light p-5 rounded-3">
                <div class="container">
                    <p class="display-4">No Threads Found</p>
                    <p class="lead">Be the first person to ask a question</p>
                </div>
             </div>';
        }
        ?>
    </div>

    <?php include 'partials/_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>