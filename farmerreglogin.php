<?php
include("header.php");
if(isset($_SESSION['customerid']))
{
	echo "<script>window.location='customerpanel.php';</script>";
}
if(isset($_SESSION['sellerid']))
{
	echo "<script>window.location='sellerpanel.php';</script>";
}
if(isset($_SESSION['workerid']))
{
	echo "<script>window.location='workerpanel.php';</script>";
}
if(isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminpanel.php';</script>";
}
?>
  <main id="main">
  
      <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Farmer Login/Register</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
<hr>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
              <h2>Farmer Login/Register</h2>
              <p>A web-based marketplace that connects farmers with customers A free online farm management system, where sellers and buyers of farm produce can connect (Buyers meet Farmers)<br></p>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">
			
              <div class="col-md-6 d-flex align-items-stretch">
                <div class="icon-box" data-aos="zoom-in" data-aos-delay="100" style="width: 100%;">
                  <div class="icon"><i class="bx bx-lock"></i></div>
                  <h4><a href="sellerloginpanel.php">Already Existing</a></h4>
				        
				  <button type="button" class="btn btn-info btn-lg btn-block" onclick="window.location='sellerloginpanel.php'">Sign In  & Get Started</button>
                </div>
              </div>

              <div class="col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                <div class="icon-box" data-aos="zoom-in" data-aos-delay="200" style="width: 100%;">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="seller.php">New User</a></h4>
				  <button type="button" class="btn btn-warning btn-lg btn-block"  onclick="window.location='seller.php'" >Not Registered? Sign Up and Start Marketing</button>
                </div>
              </div>


            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

<hr>
  </main><!-- End #main -->
  
<?php
include("footer.php");
?>