<?php
////////////////////////////
require_once("init.php");
include("checkImage.php");
////////////////////////////
?>

<!DOCTYPE html>  
<html>  
<head>  
    <title>Image Wrap</title>  
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/CSS/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
    </script> 
    <link rel="stylesheet" href="bootstrap/CSS/responsive.css">
    <link rel="stylesheet" href="bootstrap/CSS/style.css">
    <link rel="stylesheet" href="bootstrap/CSS/owl.carousel.css">
    <link rel="stylesheet" href="bootstrap/CSS/owl.theme.css">
</head>  
<body>
    <!-- Navigation
    ==========================================-->
    <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a class="navbar-brand" href="index.php">ImageWrap</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#tf-team" class="page-scroll">Watermark</a></li>
            <li><a href="#tf-signin" class="page-scroll">Make Watermark</a></li>
            <li><a href="#tf-signup" class="page-scroll" >Add Code</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Image Page
    ==========================================-->
    <div id="tf-team" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2>Make <strong>Your Watermark</strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>

                <div id="team" class="owl-carousel owl-theme row ">
                    <div class="item">
                        <div class="thumbnail">
                            <img src="out/19578.jpg" alt="..." class="img-circle team-img" id="image_preview">
                            <div class="caption">
                                <h3>Your Watermark</h3>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- image add page
    ==========================================-->
    <div id="tf-signin" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="section-title center">
                        <h2>Add Image</h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                        Add a .png type image to make a watermark for facebook profile picture.
                        make sure that cover image is having 1024x1024 resolution.<br> After creating your watermark you will be provided with a code. share it among friends to share your watermark.
                        <h5 id="userCode"></h5>
                    </div>

                    <form form enctype="multipart/form-data" action="DBConfig.php" id="uploadForm" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">User ID:</label>
                                    <input type="text" placeholder="Username" id="username" name="username" class="form-control" value="<?php echo $usernameSet;?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fileInput">Add .png Image</label>
                                    <input type="file" id="fileInput" name="fileInput" style="" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" id="submit" name="submit" class="btn tf-btn btn-default">Submit</button><br><br>
                    </form>
                </div>
            </div>
        </div>
        <hr id="signin-bottom-line">
    </div>
    
    
    <!--Addcode -->
     <div id="tf-signup" class="text-center">
        
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="section-title center">
                        <h2>Add Code</h2>
                        <div class="line">
                            <hr>
                        </div><br><br>
                        <img class="circle-frame" src='<?php echo $image;?>' id="finalImage">
                        </div>
                        <div class="clearfix"></div><br>
                        <a href='#' style="visibility:hidden" id="downloadImage" download>Download</a><br>
                        Please add the code that you provided to make the watermark for your profile picture
                    
                    
                    <form form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="uploadForm1" method="post">
                        <input type="hidden" name="image_fb" value="<?php echo $image;?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="code">Code:</label>
                                    <input type="text" placeholder="Code" id="code" name="code" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" id="submit1" name="submit1" class="btn tf-btn btn-default">Submit</button><br><br>
                    </form>
                </div>
            </div>
        </div>
        <hr id="signin-bottom-line">

    </div>
</body>

    
    
    
    
    
    
<!--Ajax request-->
<script id="source" language="javascript" type="text/javascript">
    $(document).ready(function(){
        $("#uploadForm").on("submit",function(e){
            e.preventDefault();
            $.ajax({
                url:"DBConfig.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data){
                    var result=data.split("~");
                    $("#image_preview").attr("src",result[0]);
                    $("#userCode").html("CODE:<br>" + result[1]);
                }
            });
        });
    });
</script>

    <!--final image png get-->
<script id="source" language="javascript" type="text/javascript">
    $(document).ready(function(){
        $("#uploadForm1").on("submit",function(e){
            e.preventDefault();
            $.ajax({
                url:"checkImage.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data){
                    var result=data.split("~");
                    $("#finalImage").attr("src",result[0]);
                    $("#downloadImage").attr("href",result[0]);
                    $("#downloadImage").css("visibility","visible");
                }
            });
        });
    });
</script>
    


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/JS/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="bootstrap/JS/bootstrap.js"></script>
    <script type="text/javascript" src="bootstrap/JS/SmoothScroll.js"></script>
    <script type="text/javascript" src="bootstrap/JS/jquery.isotope.js"></script>

    <script src="bootstrap/JS/owl.carousel.js"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="bootstrap/JS/main.js"></script>
</html>