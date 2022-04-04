

    <?php

    class crud
    {
        // private database object
        private $db;

        //constructor to initialize private variable to the database connection    
        function __construct($conn)
        {
            $this->db = $conn;
        }
        //function to insert a new record into the attendee database
        public function insertAttendees($firstname, $lastname, $birthday, $email, $phone, $specialty)
        {
            try {
                // define sql statement to be executed  
                $sql = "INSERT INTO attendee(firstname,lastname,birthday,emailAddress,contactNumber,specialty_id) VALUES(:firstname,:lastname,:birthday,:email,:phone,:specialty)";
                // prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);

                //bind all placaholders to the actual values
                $stmt->bindparam(':firstname', $firstname);
                $stmt->bindparam(':lastname', $lastname);
                $stmt->bindparam(':birthday', $birthday);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':phone', $phone);
                $stmt->bindparam('specialty', $specialty);

                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function editAttendee($id, $firstname, $lastname, $birthday, $email, $phone, $specialty)
        {
            try {
                $sql = "UPDATE `attendee` SET `firstname`= :firstname,`lastname`= :lastname,`birthday`= :birthday,`emailAddress`= :email,`contactNumber`= :phone,`specialty_id`= :specialty WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);

                //bind all placaholders to the actual values
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':firstname', $firstname);
                $stmt->bindparam(':lastname', $lastname);
                $stmt->bindparam(':birthday', $birthday);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':phone', $phone);
                $stmt->bindparam('specialty', $specialty);

                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        public function getAttendees()
        {
            try {
                $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id;";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendeeDetails($id)
        {
            try {
                $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteAttendee($id)
        {
            try {
                $sql = "DELETE FROM `attendee` WHERE attendee_id = :id ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getSpecialties()
        {
            try {
                $sql = "SELECT * FROM `specialties`;";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }

    ?> 