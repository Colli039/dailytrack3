
<!-- Section: boxes -->
<section id="main_boxes" class="home-section paddingtop-100">


<div class="container" style=" margin-left: 300px;">

<h3 class="h-bold title" style="color:#36d3d9;margin-top: 20px;"><b>Welcome back, <?php echo "Adelyn" ?>!</b></h3>
<h4 class="h-xlight title" style="color:#a3a3a3;">What would you like to do today?</h4>


	<div class="row home-selection">
		<div class="col-sm-3 col-md-3">
        <button id="profile_btn" class="btnProfile btnHome box text-center wow fadeInUp" data-wow-delay="0.2s">
  					<i class="fas fa-user-circle big"></i>
  					<p class="text-center" style="margin-top:20px;color:#666666;">Profile</p>
        </button>
		</div>

		<div class="col-sm-3 col-md-3">
        <button id="sstones_btn" class="btnSteppingStones btnHome box text-center wow fadeInUp" data-wow-delay="0.2s">
					<i style="margin-top: -40px;" class="fas fa-list-alt big"></i>
					<p style="margin-top:20px;color:#666666;">Stepping Stones</p>
    </button>
		</div>

		<div class="col-sm-3 col-md-3">
        <button id="journal_btn" class="btnJournal btnHome box text-center wow fadeInUp" data-wow-delay="0.2s">
					<i class="fas fa-book big"></i>
					<p style="margin-top:20px;color:#666666;">Journal</p>
      </button>
		</div>

	</div>
</div>

</section>

      <?php
        // echo '<p>Last session: ' . $_SESSION['timestamp'] . '</p>';
        // echo '<p>Current time: ' . time() . '</p>';
        echo '<h6><h5 id="numCount"></h5></h6>';
      ?>
