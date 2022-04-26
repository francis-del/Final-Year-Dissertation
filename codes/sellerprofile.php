<?php 
if(!isset($_SESSION)) { session_start(); }
include("header.php");
include("dbconnection.php");
if(!isset($_SESSION['sellerid']))
{
	echo "<script>window.location='customerpanel.php';</script>";
}
if($_SESSION['randnumber']  == $_POST['randnumber'])
{
if(isset($_POST['submit']))
{
		$sql ="UPDATE seller SET seller_name='$_POST[sellername]', seller_address='$_POST[selleraddress]', state_id='$_POST[state]', country_id='$_POST[country]', city_id='$_POST[city]', postcode='$_POST[postcode]', contact_number='$_POST[contactnumber]', mobile_no='$_POST[mbnumber]', email_id='$_POST[emailid]', bank_name='$_POST[bankname]', bank_branch='$_POST[branch]', bank_IFSC='$_POST[ifsccode]', bank_acno='$_POST[bankacnumber]', status='Active' WHERE seller_id='$_SESSION[sellerid]'";
		if(!mysqli_query($con,$sql))
		{
			echo "Error in mysqli query";
		}
		else
		{
			echo "<script>alert('Seller record updated successfully...');</script>";
		}
}
}
$randnumber = rand();
$_SESSION['randnumber'] = $randnumber;
if(isset($_SESSION['sellerid']))
{
	$sql = "SELECT * FROM seller WHERE seller_id='$_SESSION[sellerid]'";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>
  <main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center" data-aos="zoom-in">
		<br><br>
          <h3>Farmer Profile</h3>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">

          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
            <div class="info mt-4">
			
		<center><h4>Update Your Profile Here..</h4></center><hr>
<form method="post" action="" name="frmsellprofile" onSubmit="return validatesellprofile()">
<input type="hidden" name="randnumber" value="<?php echo $randnumber; ?>" >
				  
<div class="form-row">
	<div class="col-md-6 form-group">
	Farmer Name  <font color="#FF0000">*</font>
	  <input type="text" name="sellername" id="sellername" value="<?php echo $rsedit['seller_name']; ?>" autofocus class="form-control" >
	</div>	
	
	<div class="col-md-6 form-group">
	Email ID <font color="#FF0000">*</font>
	  <input type="email" name="emailid" id="emailid" value="<?php echo $rsedit['email_id']; ?>" class="form-control" >
	</div>	
		
	
	<div class="col-md-12 form-group">
	 Address <font color="#FF0000">*</font>
	  <textarea name="selleraddress" id="selleraddress" class="form-control"><?php echo $rsedit['seller_address']; ?></textarea>
	</div>
	
	<div class="col-md-6 form-group">
	Country <font color="#FF0000"> *</font>
	  <select name="country" id="country" onChange="loadstate(this.value)" class="form-control">
		  <option value="">Select</option>
		  <?php
		  $sql1 = "SELECT * FROM country where status='Active'";
			$qsql1 =mysqli_query($con,$sql1);
		  while($rssql1 = mysqli_fetch_array($qsql1))
		  {
			  if($rssql1['country_id'] == $rsedit['country_id'] )
			  {
			  echo "<option value='$rssql1[country_id]' selected>$rssql1[country]</option>";
			  }
			  else
			  {
			  echo "<option value='$rssql1[country_id]'>$rssql1[country]</option>";
			  }
		  }
		  ?>
		</select>
	</div>
	
	<div class="col-md-6 form-group">
	State <font color="#8D0801"> *</font>
	  <span id='loadstate'><select name="state" id="state" class="form-control">
                                   <option value="">Select</option>
                                  <?php
								  $sql2 = "SELECT * FROM state where status='Active'";
									$qsql2 =mysqli_query($con,$sql2);
								  while($rssql2 = mysqli_fetch_array($qsql2))
								  {
									  if($rssql2['state_id'] == $rsedit['state_id'] )
									  {
									  echo "<option value='$rssql2[state_id]' selected>$rssql2[state]</option>";
									  }
									  else
									  {
									  echo "<option value='$rssql2[state_id]'>$rssql2[state]</option>";
									  }
								  }
								  ?>
						          </select></span>
	</div>
	
	<div class="col-md-6 form-group">
	City <font color="#8D0801"> *</font>
	  <span id='loadcity'><select name="city" id="city" class="form-control">
                                   <option value="">Select</option>
                                  <?php
								  $sql3 = "SELECT * FROM city where status='Active'";
									$qsql3 =mysqli_query($con,$sql3);
								  while($rssql3 = mysqli_fetch_array($qsql3))
								  {
									  if($rssql3['city_id'] == $rsedit['city_id'] )
									  {
									  echo "<option value='$rssql3[city_id]' selected>$rssql3[city]</option>";
									  }
									  else
									  {
									  echo "<option value='$rssql3[city_id]'>$rssql3[city]</option>";
									  }
								  }
								  ?>
						          </select></span>
	</div>
	
	
	<div class="col-md-6 form-group">
	Poscode <font color="#FF0000"> *</font>
	<input type="text" pattern="[0-9][0-9]{3}\s?[a-zA-Z{2} title="Five digit post code" value="<?php echo $rsedit['postcode']; ?>" class="form-control">
	</div>
	
	<div class="col-md-6 form-group">
	Contact Number <font color="#8D0801"> *</font>
	  <input type="number" name="contactnumber" id="contactnumber" value="<?php echo $rsedit['contact_number']; ?>" class="form-control">
	</div>
	
	<div class="col-md-6 form-group">
	Mobile Number <font color="#8D0801"> *</font>
	  <input type="number" name="mbnumber" id="mbnumber" value="<?php echo $rsedit['mobile_no']; ?>" class="form-control">
	</div>
		

	<div class="col-md-6 form-group">
	Bank Name  <font color="#8D0801">*</font>
	  <input type="text" name="bankname" id="bankname" value="<?php echo $rsedit['bank_name']; ?>" autofocus class="form-control" >
	</div>	
	
	
	<div class="col-md-6 form-group">
	Branch  <font color="#8D0801">*</font>
	  <input type="text" name="branch" id="branch" value="<?php echo $rsedit['bank_branch']; ?>" autofocus class="form-control" >
	</div>	
	
	
	<div class="col-md-6 form-group">
	SORT Code  <font color="#8d0801">*</font>
	  <input type="number" name="sortcode" id="sortcode" value="<?php echo $rsedit['bank_SORTCODE']; ?>" autofocus class="form-control" >
	</div>	
	
	
	<div class="col-md-6 form-group">
	Bank Account Number  <font color="#8D0801">*</font>
	  <input type="text" name="bankacnumber" id="bankacnumber" value="<?php echo $rsedit['bank_acno']; ?>" autofocus class="form-control" >
	</div>	

</div>
<hr>
<button type="submit" name="submit" id="submit" class="btn btn-info btn-lg btn-block" >Click here to Update Profile</button>

</form>
            </div>
		  </div>
		  
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  
<?php
include("footer.php");
?>
<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
	<script type="application/javascript">
      function validatesellprofile()
	  {
				var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
				var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
				var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
				var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID

		  if(document.frmsellprofile.sellername.value == "")
		  {
			alert("Seller name should not be empty..");
			document.frmsellprofile.sellername.focus();
			return false;
		  }
		  else if(!document.frmsellprofile.sellername.value.match(alphaspaceExp))
		{
			alert("Please enter only letters for Seller name..");
			document.frmsellprofile.sellername.focus();
			return false;
		}
			  else if(document.frmsellprofile.selleraddress.value == "")
		  {
			alert("Seller address should not be empty..");
			document.frmsellprofile.selleraddress.focus();
			return false;
		  }
		  else if(document.frmsellprofile.country.value == "")
		  {
			alert("Select the country..");
			document.frmsellprofile.country.focus();
			return false;
		  }
		    else if(document.frmsellprofile.state.value == "")
		  {
			alert("Select the state...");
			document.frmsellreg.state.focus();
			return false;
		  }
		    else if(document.frmsellprofile.city.value == "")
		  {
			alert("Select the city..");
			document.frmsellprofile.city.focus();
			return false;
		  }
		   else if(document.frmsellprofile.pincode.value == "")
		  {
			alert("Enter the pincode..");
			document.frmsellprofile.pincode.focus();
			return false;
		  }
		   else if(document.frmsellprofile.emailid.value == "")
		  {
			alert("Enter the E-Mail ID..");
			document.frmsellprofile.emailid.focus();
			return false;
		  }
		  	else if(!document.frmsellprofile.emailid.value.match(emailExp))
	{
		alert("Enter Valid Email ID.");
		document.frmsellprofile.emailid.focus();
		return false;
	}	
		   else if(document.frmsellprofile.bankname.value == "")
		  {
			alert("Enter the name of the bank...");
			document.frmsellprofile.bankname.focus();
			return false;
		  }
		    else if(!document.frmsellprofile.bankname.value.match(alphaspaceExp))
		{
			alert("Please enter only letters..");
			document.frmsellprofile.bankname.focus();
			return false;
		}
		    else if(document.frmsellprofile.branch.value == "")
		  {
			alert("Enter the branch of the bank...");
			document.frmsellprofile.branch.focus();
			return false;
		  }
		    else if(!document.frmsellprofile.branch.value.match(alphaspaceExp))
		{
			alert("Please enter only letters ..");
			document.frmsellprofile.branch.focus();
			return false;
		}
		   else if(document.frmsellprofile.ifsccode.value == "")
		  {
			alert("Enter the IFSC Code of the bank...");
			document.frmsellprofile.ifsccode.focus();
			return false;
		  }
		   else if(document.frmsellprofile.ifsccode.value.length > 11)
		  {
			alert("Enter a valid 11 Characters IFSC Code...");
			document.frmsellprofile.ifsccode.focus();
			return false;
		  }
		   else if(document.frmsellprofile.ifsccode.value.length < 11)
		  {
			alert("Enter a valid 11 Characters IFSC Code...");
			document.frmsellprofile.ifsccode.focus();
			return false;
		  }
		  else if(document.frmsellprofile.bankacnumber.value == "")
		  {
			alert("Enter the A/c number of the bank...");
			document.frmsellprofile.bankacnumber.focus();
			return false;
		  }
		  else
		  {
			  return true;
		  }
	  }
	  
	  
function loadstate(id) {
    if (id == "") {
        document.getElementById("loadstate").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("loadstate").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","ajaxstate.php?id="+id+"&profile=set",true);
        xmlhttp.send();
    }
}
function loadcity(id) {
    if (id == "") {
        document.getElementById("loadcity").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("loadcity").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","ajaxcity.php?id="+id+"&profile=set",true);
        xmlhttp.send();
    }
}
	  </script>