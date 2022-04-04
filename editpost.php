    <?php

    require_once 'db/conn.php';

    //Get values from post operation

    if (isset($_POST['submit'])) {
        //extract values from the $_POST array
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $birthday = $_POST['birthday'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $specialty = $_POST['specialty'];




        //Call Crud Function
        $result = $crud->editAttendee($id, $firstname, $lastname, $birthday, $email, $phone, $specialty);


        //Redirect to index.php
        if ($result) {
            header("Location: viewrecords.php");
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }















    ?>