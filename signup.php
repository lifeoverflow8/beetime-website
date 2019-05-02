<?php
    include_once('include/dbh.inc.php');
    include_once("header.inc.php");
?>
<main>
    <div id="signup-div">
        <h1>Create Account</h1> <br>
        <form action="include/signup.inc.php" method="POST">
            <input class="textbox-normal" type="text" name="first" placeholder="First Name"> <br> <br>
            <input class="textbox-normal" type="text" name="last" placeholder="Last Name"> <br> <br>
            <input class="textbox-normal" type="text" name="uid" placeholder="Username"> <br> <br>
            <input class="textbox-normal "type="text" name="email" placeholder="Email"> <br> <br>
            <input class="textbox-normal" type="password" name="pwd" placeholder="Password"> <br> <br>
            <input class="textbox-normal" type="password" name = "pwd-repeat" placeholder="Repeat Password"> <br> <br>
            <button class="signup" type="submit" name="signup-submit" placeholder="">Register</button>
        </form>
    </div>

</main>