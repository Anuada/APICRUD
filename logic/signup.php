<?php
session_start();
require_once "../util/DbHelper.php";

require_once "../util/DirHandler.php";

$db = new DbHelper();
$dh = new DirHandler();

if (isset($_POST["signup"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $dob = $_POST["dob"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $user_type = $_POST["user_type"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $con_password = $_POST["con_password"];

    if (!empty(trim($fname)) && !empty(trim($lname)) && !empty(trim($dob)) && !empty(trim($contact)) && !empty(trim($address)) && !empty(trim($email)) && !empty(trim($user_type)) && !empty(trim($username)) && !empty(trim($password)) && !empty(trim($con_password))) {
        if ($user_type != 'Admin' && $user_type != 'admin') {
            $check_email = $db->fetchRecord("account", ["email" => $email]);
            if ($check_email == null) {
                $check_username = $db->fetchRecord("account", ["username" => $username]);
                if ($check_username == null) {
                    if ($password === $con_password) {

                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $db->addRecord("account", ["accountId" => $accountId, "email" => $email, "username" => $username, "password" => $password, "user_type" => $user_type, "isLogin" => "0"]);
                        $accountuser = $db->fetchRecord("account", ["email" => $email])[0];
                        $accountId = $accountuser["accountId"];
                        if (isset($_FILES["profile_image"]) && $_FILES['profile_image']['size'] > 0) {
                            $info = ["accountId" => $accountId, "fname" => $fname, "lname" => $lname, "address" => $address, "DOB" => $dob, "contactNo" => $contact, "profileImage" => $accountId . ".png"];
                            switch ($user_type) {
                                case 'users':
                                    $img_name = $accountId . ".png";
                                    $img_file = $dh->users_profile . $img_name;
                                    move_uploaded_file($_FILES["profile_image"]["tmp_name"], $img_file);
                                    $db->addRecord("users", $info);
                                    break;

                                

                                default:

                                    break;
                            }
                        } else {
                            $info = ["accountId" => $accountId, "fname" => $fname, "lname" => $lname, "address" => $address, "DOB" => $dob, "contactNo" => $contact];
                            switch ($user_type) {
                                case 'users':
                                    $db->addRecord("users", $info);
                                    break;



                                case 'youth_leader':
                                    $db->addRecord("youth_leader", $info);
                                    break;



                                default:
                                    break;
                            }
                        }
                        $_SESSION["m"] = "Successful Register";
                        header("Location: ../page/");
                        exit();
                    } else {
                        $_SESSION["m"] = "Passwords do not match!";
                        header("Location: ../page/signup.php");
                        exit();
                    }
                } else {
                    $_SESSION["m"] = "Username already exists!";
                    header("Location: ../page/signup.php");
                    exit();
                }
            } else {
                $_SESSION["m"] = "Email already exists!";
                header("Location: ../page/signup.php");
                exit();
            }
        } else {
            $_SESSION["m"] = "Invalid user type!";
            header("Location: ../page/signup.php");
            exit();
        }
    } else {
        $_SESSION["m"] = "Fill out the missing fields!";
        header("Location: ../page/signup.php");
        exit();
    }
} else {
    header("Location: ../page/signup.php");
    exit();
}
