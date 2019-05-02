<?php
    include_once('include/dbh.inc.php');
    include_once("header.inc.php");
?>


<body>
    <div id="container-right">
        <button onclick="openLoginForm()">Log In</button>
    </div>
    </div>
    <p>
        You are logged in.
    </p>
    <p>
        You are not logged in.
    </p>
    <div id="center-text">
        <span id="what-time-is-it">What time is it?</span> <br>
        <span id="beetime-text">It's Bee Time!</span> <span style="font-size:8px; color:rgb(255, 0, 0);">(beta)</span> <br>
        <span id="time">12:00:00 AM</span>
        <form method="GET">
            <input type="text" id="search" name="search" placeholder="Google search..."> <br>
            <button type="submit" class="bee-event-button">GOOGLE SEARCH</button>
            <button type="button" class="bee-event-button">RANDOM BEE EVENT</button>
        </form>
    </div>
    <div id="container-bottom-right">
        
    </div>
    <script src="main.js"></script>
<?php
    
    //If there is a search term, redirect to google with search term in the url
    if ($_GET['search'] != null) {
        $search_term = urlencode($_GET['search']);
            
        header("Location: https://www.google.com/search?q=" . $search_term, true, 301);
        exit();
    }


?>

</body>

<?php
    include_once("footer.inc.php");
?>