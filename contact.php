<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact | iShare Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font (optional for clean look) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="assets/images/favicon/apple-touch-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/cs/style.css">
</head>

<body>
    <?php include 'partials/_conn.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <div class="container contact-container">
        <div class="card contact-card p-4 mt-2">
            <h2 class="text-center contact-title mb-4">📬 Contact Us</h2>
            <p class="text-center text-muted mb-4">Have questions, suggestions, or feedback? Feel free to reach out to us.</p>
            <form action="partials/_handleContact.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Enter Full Name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Enter Email Address">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Type your message here..."></textarea>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>
        </div>
    </div>

    <?php include 'partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
