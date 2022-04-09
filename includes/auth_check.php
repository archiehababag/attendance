    <?php 


        // CHeck if user is authenticated. to be added to view records, edit pages
        if(!isset($_SESSION['userid'])) {

            header("Location: login.php");

        }



    ?>