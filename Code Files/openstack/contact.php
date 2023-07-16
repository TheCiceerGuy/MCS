<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Openstact </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <?php
          session_start();

          if(isset($_SESSION['username'])){
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='#'>Welcome, ".$_SESSION['username']."</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='logout.php'>Logout</a>";
            echo "</li>";
          } else {
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='login.php'>Login</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='register.php'>Register</a>";
            echo "</li>";
          }
        ?>
      </ul>
    </div>
  </nav>

  <div class="container mt-5">
    <h1>Contact Us</h1>
    <form action="contact_process.php" method="POST">
      <div class="form-group">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
