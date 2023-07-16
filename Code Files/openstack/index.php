<!DOCTYPE html>
<html>
<head>
  <title>Openstack</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .comment-section {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Introduction to OpenStack</a>
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
            echo "<a class='nav-link' href='contact.php'>Contact Us</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='logout.php'>Logout</a>";
            echo "</li>";
          } else {
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='contact.php'>Contact Us</a>";
            echo "</li>";
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

  <div class="container comment-section">
    <div class="jumbotron">
      <h1 class="display-4"> Openstack Basics</h1>
      <p class="lead">OpenStack is a cloud OS that is used to control the large pools of computing, storage, 
        and networking resources within a data center.
        <ul>
          <li> is a collection of open-source software modules and tools that provides a 
            framework to create and manage both public cloud and private cloud infrastructure.</li>
          <li>In OpenStack, the tools which are used to build this platform are referred to as “projects”.</li>
          <li> These projects handle a large number of services including computing, networking, and storage services</li>
       </ul>
      </p>
      <hr class="my-4">
      <img src="images/1.png" class="img-fluid" alt="Image">
    </div>

    <?php
      // Database configuration
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "openstack";

      // Create a database connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Check if user is logged in
      if(isset($_SESSION['username'])){
        echo "<div class='jumbotron'>";
        echo "<h1 class='display-4'>Welcome, ".$_SESSION['username']."!</h1>";
        echo "<form action='comment.php' method='POST'>";
        echo "<div class='form-group'>";
        echo "<label for='comment'>Leave a Comment:</label>";
        echo "<textarea class='form-control' id='comment' name='comment' rows='4' cols='50'></textarea>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Submit Comment</button>";
        echo "</form>";
        echo "</div>";
      } else {
        echo "<div class='jumbotron'>";
        echo "<h1 class='display-4'>Please login or register to leave a comment</h1>";
        echo "<a href='login.php' class='btn btn-primary'>Login</a> ";
        echo "<a href='register.php' class='btn btn-secondary'>Register</a>";
        echo "</div>";
      }

      // Fetch and display comments
      $sql = "SELECT * FROM comments";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<h2>Comments:</h2>";
        while($row = $result->fetch_assoc()) {
          echo "<div class='card mb-3'>";
          echo "<div class='card-body'>";
          echo "<h5 class='card-title'> <b>Username :</b> ".$row['username']."</h5>";
          echo "<p class='card-text'> <b>Comment</b> :".$row['comment']."</p>";
          echo "<p class='card-text'> <b>Commented On:</b> ".$row['created_at']."</p>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        echo "<p>No comments yet.</p>";
      }

      // Close the database connection
      $conn->close();
    ?>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
