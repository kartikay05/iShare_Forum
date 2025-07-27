<?php
include 'partials/_conn.php';
include 'partials/_header.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About | iShare Forum</title>

    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon/apple-touch-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/cs/style.css">
</head>

<body>
    <main class="container my-5">
        <div class="text-center mb-5">
            <h1 class="about-title">About iShare Forum</h1>
            <p class="lead">A clean and friendly space for asking questions, learning to code, and sharing what you
                know.</p>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="about-card">

                    <h2 class="section-heading">📌 What is iShare?</h2>
                    <p>
                        <strong>iShare</strong> is a simple coding discussion forum built for learning, practicing, and
                        connecting with fellow developers. It's a project made with PHP, MySQL, and Bootstrap — perfect
                        for those exploring web development fundamentals.
                    </p>

                    <h2 class="section-heading">💬 Threads & Comments</h2>
                    <p>
                        In each <strong>category</strong>, users can create <strong>threads</strong> to ask questions or
                        start discussions. Other users can join in by commenting, making it easy to crowdsource ideas or
                        get help.
                    </p>

                    <h2 class="section-heading">🔍 Search Functionality</h2>
                    <p>
                        The forum includes a live search feature (available in the navbar) that allows users to quickly
                        find relevant threads using keywords in titles or descriptions.
                    </p>

                    <h2 class="section-heading">🔐 User Login & Signup</h2>
                    <p>
                        Users must <strong>sign up</strong> to participate in discussions or create new threads.
                        Authentication ensures a personalized and safe experience while maintaining basic security.
                    </p>

                    <h2 class="section-heading">🚀 Practice-Based Learning</h2>
                    <p>
                        iShare was created as a learning project — it demonstrates essential backend and frontend
                        integration, from database connections to UI styling using Bootstrap 5.
                    </p>

                    <p class="mt-4">
                        Whether you're practicing PHP, MySQL, or just exploring how forums work, iShare gives you a
                        real-world template to build on. Happy coding! 💻
                    </p>
                </div>
            </div>
        </div>
    </main>

    <?php include 'partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>