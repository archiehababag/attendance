    <?php

    date_default_timezone_set('Asia/Manila');

    $title = 'Index';

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

    ?>


    <!--
        - First Name
        - Last Name
        - Date of Birth (Use DatePicker)
        - Specialty (Database Admin, Software Developer, Web Administrator, Other)
        - Email Address
        - Contact Number
    -->


    <h1 class="text-center">Registration for IT Conference</h1>

    <form method="post" action="success.php">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">

        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">

        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Date Of Birth</label>
            <input type="text" class="form-control" id="birthday" name="birthday">
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Area of Expertise</label>
            <select class="form-select" aria-label="Default select example" id="specialty" name="specialty">

                <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name']; ?></option>
                <?php } ?>

            </select>
        </div>
        <div class="mb-3">
            <label for="email1" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="email1" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <div class="input-group mb-3">
            <label for="avatar">Upload Image (Optional)</label>
            <input type="file" class="custom-file-input" id="avatar" name="avatar">
            <label for="custom-file-label">Choose File</label>
        </div>


        <div class="d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
    </form>

    <br />
    <br />
    <br />
    <br />
    <br />


    <?php require_once 'includes/footer.php'; ?>