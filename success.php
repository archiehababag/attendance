    <?php
    $title = 'Success Page';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendemail.php';

    if (isset($_POST['submit'])) {
        //extract values from the $_POST array
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $birthday = $_POST['birthday'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $specialty = $_POST['specialty'];

        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$phone.$ext";
        move_uploaded_file($orig_file,$destination);

        //Call function to insert and track if successful or not
        $isSuccess = $crud->insertAttendees($firstname, $lastname, $birthday, $email, $phone, $specialty, $destination);
        $specialtyName = $crud->getSpecialtyById($specialty);

        if ($isSuccess) {
            SendEmail::sendMail($email, 'Welcome to IT Conference 2022', 'You have successfully registered for this year\'s IT Conference');
            echo '<h1 class="text-center text-success">You Have Been Registered!</h1>';
            include 'includes/successmessage.php';
        } else {

            echo '<h1 class="text-center text-danger">There was an error Processing!</h1>';

            include 'includes/errormessage.php';
        }
    }
    ?>

    <!-- <h1 class="text-center text-success">You Have Been Registered!</h1> -->

    <!-- This prints out values that were passed to the action page using method="get" -->

    <!-- <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php //echo $_GET['firstname'] . ' ' . $_GET['lastname'];  ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php //echo $_GET['specialty'];  ?>
            </h6>
            <p class="card-text">
                Date of Birth: <?php //echo $_GET['birthday']; ?>
            </p>
            <p class="card-text">
                Email Add: <?php //echo $_GET['email']; ?>
            </p>
            <p class="card-text">
                Contact No.: <?php //echo $_GET['phone']; ?>
            </p>
        </div>
    </div> -->

    <img src="<?php echo $destination; ?>" class="rounded-circle" style="width: 15%; height: 15%" />

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $specialtyName['name']; ?>
            </h6>
            <p class="card-text">
                Date of Birth: <?php echo $_POST['birthday']; ?>
            </p>
            <p class="card-text">
                Email Add: <?php echo $_POST['email']; ?>
            </p>
            <p class="card-text">
                Contact No.: <?php echo $_POST['phone']; ?>
            </p>

        </div>
    </div>

    <?php

    // echo $_GET['firstname'];
    // echo $_GET['lastname'];
    // echo $_GET['birthday'];
    // echo $_GET['specialty'];
    // echo $_GET['email'];
    // echo $_GET['phone'];

    ?>

    <br />
    <br />
    <br />
    <br />
    <br />


    <?php require_once 'includes/footer.php'; ?>