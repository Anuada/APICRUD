<?php
session_start();

$title = "Log Form";

ob_start();
$navbar = ob_get_clean();
?>

<?php ob_start() ?>

<div id="div_container" class="reverse-flex margin-top-20" style="display:flex; justify-content: space-around; align-items: center;">
    <div class="margin-top-5">
        <div id="select_button" style="display: flex; flex-direction: column; height: 100vh;">
            <div class="w3-padding" style="margin-top: 50px; width: 160px; height: 80px; margin-right: 1170px; margin-top: 496px">
                <button class="btn btn-lg choice" id="data_from_api" style="width: 500px; height: 90px; background-color: yellow; color: black; font-size: 25px; font-weight: bold">Employee</button>
            </div>
            <div class="w3-padding" style="margin-top: 50px;">
                <button class="btn btn-lg choice" id="input_data_from_computer" style="width: 500px; height: 90px; background-color: Yellow; color: black; font-size: 25px; font-weight: bold">Visitor</button>
            </div>
        </div>
        <div id="logbook_form" class="container div-margin-top log-form-width" style="display:none"></div>
    </div>
</div>


<?php
$content = ob_get_clean();
ob_start();
?>

<script type="module" src="../assets/log_form_api.js"></script>

<?php
$scripts = ob_get_clean();
require_once "../shared/layout.php";
?>