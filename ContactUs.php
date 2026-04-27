<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Contact Us - Itali Express</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="flag.png">

    <style>
  input{
	border: double 3px;
    }

    body{
      background-color: 	#E2D9C5;
    }

</style>

</head>

<body>

        <!-- heading -->


        <div class="row mt-3 px-4">
  <div class="col text-success"><h1 style="font-weight: bold; text-decoration: underline;">Contact Us</h1>
        <p style="color: black;">If you have any qustions regarding our services, please fill out the inquiry form. We're happy to help to the best of our ability.</p>
</div>
  <div class="col pt-5">
        <form style="border:solid white 1px;" class="container pt-1">

      <label >First name:</label><br>
  <input type="text" placeholder="John"><br>
  
  <label>Last name:</label><br>
  <input type="text" placeholder="Doe"><br><br>

        <label>Email</label>
        <br>
        <input type="email">
        <br><br>

        <label>Message</label>
        <br>
        <textarea rows="10" cols="25"></textarea>

        <div class="container mt-3">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
          Send Message
        </button>
          </div>
          <br>

    </form>
    </div>
    <br>
    <br>
</div>

</div>

    

<!-- footer -->
        <footer class="text-center py-4 mt-5 border-top border-danger border-2">
            
            <p style="font-weight: bold; font-size: 20px; color: darkgreen;">Follow And Review Us Here: 
                
            <a class="mx-2 text-success" href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
            <a class="mx-2 text-success" href="https://www.facebook.com/"><i class="bi bi-facebook"></i></a>
            <a class="mx-2 text-dark" href="https://www.yelp.com/"><i class="bi bi-yelp"></i></a>
</p>
        </footer>

</body>
</html>