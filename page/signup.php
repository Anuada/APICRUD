<?php session_start() ?>
<?php $title = "Sign Up" ?>
<?php ob_start() ?>
<link rel="stylesheet" href="../assets/css/signup.css">
<link rel="stylesheet" href="../assets/css/image.uploader.css">
<?php $styles = ob_get_clean() ?>

<?php ob_start() ?>

<div class="container pt-1">

    <p class="text-center fuchsia pt-4" id="su" style="text-shadow: 1px 1px 2px #464646; font-size: 50px;">
        Register
    </p>
</div>

<div class="container">
    <form method="post" action="../logic/signup.php" enctype="multipart/form-data" id="signupform">
        <div class="row">
            <div class="col-md-3 ms-md-auto">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 signup-container rounded w-form mb-20 d-flex justify-content-center">
                            <input type="file" accept="image/*" name="profile_image" id="profile_image" class="ProfileImage">
                            <label for="profile_image" class="ProfileImageLabel" title="Upload an image">
                                <span class="UploadText"><i class="fa-solid fa-user fuchsia" style="font-size:150px"></i></span>
                                <img id="imagePreview" src="#" alt="Preview" style="display: none;">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <label class="fuchsia fw-bold" id="uploadLabel">UPLOAD IMAGE</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 signup-container bg-bubble-gum p-4 rounded w-form mb-20 shadow-sm pb-4">
                            <!-- <h2 class="text-center mb-4 fuchsia">Personal Info</h2> -->
                            <p class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="fuchsia" for="fname">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                                </div>
                                <div class="col">
                                    <label class="fuchsia" for="lname">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                                </div>
                            </div>
                            </p>
                            <p class="form-group">
                                <label class="fuchsia" for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                            </p>
                            <p class="form-group">
                                <label class="fuchsia" for="contact">Contact Number</label>
                                <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter your phone No.">
                            </p>
                            <p class="form-group">
                                <label for="address" class="fuchsia">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address">
                            </p>
                            <p class="form-group">
                                <label for="email" class="fuchsia">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 signup-container bg-bubble-gum p-4 rounded w-form mb-20 shadow-sm pb-2">
                            <!-- <h2 class="text-center mb-4 fuchsia">Account Info</h2> -->
                            <p class="form-group pt-3">
                                <label for="user_type" class="fuchsia">User Type</label>
                                <select class="form-control" id="user_type" name="user_type">
                                    <option disabled selected>Choose user type</option>
                                    <option value="users">Users</option>
                                   
                                </select>
                            </p>
                            <p class="form-group">
                                <label for="username" class="fuchsia">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                            </p>
                            <p class="form-group">
                                <label for="password" class="fuchsia">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            </p>
                            <p class="form-group">
                                <label for="con_password" class="fuchsia">Confirm Password</label>
                                <input type="password" class="form-control" id="con_password" name="con_password" placeholder="Re-enter your password">
                            </p>
                            <p class="form-group">
                                <button type="submit" name="signup" class="btn bg-fuchsia text-white" style="width: 100%">Sign Up</button>
                            <p class="text-muted text-center">Already Have an Account? <a href="./login.php" class="fuchsia" style="text-decoration:none">Login</a></p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php $content = ob_get_clean() ?>

<?php ob_start() ?>
<script src="../assets/js/image.preview.js"></script>
<script src="../assets/js/signup.session.storage.js"></script>
<?php $scripts = ob_get_clean() ?>

<?php require_once "../shared/layout.php" ?>