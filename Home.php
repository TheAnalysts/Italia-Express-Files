<?php
session_start();
?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="flag.png">
    <title>Itali Express</title>

    <style>
    body{
        background-color: #E2D9C5;
}
</style>
    
</head>

<body>
     
<div class="container text-center mt-5">
        <h1 class="display-4 text-success">Welcome to Itali Express</h1>
        
        <a href="menu.php" class="btn btn-danger btn-lg"> Order Now!</a>
    </div>



<div class="row d-flex justify-content-center py-2 mt-2">
<div class="col-md-6">
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

<!-- indicator dots -->
         <!-- note to self: data-bs-target has to be the same for all or it breaks -->
         <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" 
            data-bs-slide-to="0" class="active">
            </button>

            <button type="button" data-bs-target="myCarousel" 
            data-bs-slide-to="1" >
            </button>

            <button type="button" data-bs-target="#myCarousel" 
            data-bs-slide-to="2" >
            </button>
         </div>

<div class="carousel-inner border">
    <div class="carousel-item active">
      <img class="d-block w-100" src="carousel1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="carousel2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="carousel3.jpg" alt="Third slide">
    </div>
  </div>

<!-- left and right controls -->
           <button class="carousel-control-prev" type="button" 
           data-bs-target="#myCarousel" data-bs-slide="prev">
           <span class="carousel-control-prev-icon"></span>
           </button>
           
           <button class="carousel-control-next" type="button" 
           data-bs-target="#myCarousel" data-bs-slide="next">
           <span class="carousel-control-next-icon"></span>
           </button>

</div>
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