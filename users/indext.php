<?php
session_start();
include "../shared/session.woman.php";
require_once "../util/DbHelper.php";
$db = new DbHelper();
$title = "Women";
ob_start();
include "../shared/navbar.onlyindexwoman.php";
$navbar = ob_get_clean();
?>

<?php ob_start() ?>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<?php $styles = ob_get_clean() ?>

<?php ob_start() ?>
<link rel="stylesheet" href="../assets/css/stylewoamn.css">
<div class="main-wrapper">

  <section class="section section-search">
    <div class="container-fluid">
      <div class="banner-wrapper">
        <div class="banner-header text-center">

        </div>
      </div>
    </div>
  </section>

  <section class="section section-specialities">
    <div class="container-fluid">
      <div class="section-header text-center">
        <h2>John 14:6</h2>
        <p class="sub-title">I am the way and the truth and the life</p>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-9">
          <div class="specialities-slider slider">
            <div class="speciality-item text-center">
              <div class="speciality-img">
                <img src="../assets/img/misc/Event.png" class="img-fluid" alt="Speciality">
                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
              </div>
              <p><a href="events.php" class="button-link">Youth Event</a></p>
            </div>

            <div class="speciality-item text-center">
              <div class="speciality-img">
                <img src="../assets/img/misc/Forum.png" class="img-fluid" alt="Speciality">
                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
              </div>
              <p><a href="community.php" class="button-link">Forum</a></p>
            </div>

            <div class="speciality-item text-center">
              <div class="speciality-img">
                <img src="../assets/img/misc/cross.jpg" class="img-fluid" alt="Speciality">
                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
              </div>
              <p><a href="Forum.php" class="button-link">Outreach Area</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

</div>

<?php $content = ob_get_clean() ?>

<?php ob_start() ?>
<script src="../assets/js/jquery.minwoman.js"></script>
<script src="../assets/js/slickwoman.js"></script>
<script src="../assets/js/scriptwoman.js"></script>
<script src="../assets/js/navbar.js"></script>
<?php $scripts = ob_get_clean() ?>

<?php require_once "../shared/layout.php" ?>﻿