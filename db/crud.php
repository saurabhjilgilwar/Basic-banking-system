<?php 
    class crud{
        //private database object
        private $db;

        //constructor to initialise private variable to the database connection.
        function __construct($conn){
            $this->db = $conn;
        }

        //fuction to insert a new record into the attendee database
        public function insertUsers($fname, $email, $gender, $balance){
            try{
                $result = $this->getUsersbyEmail($email);
                if($result['num'] > 0){
                    return false;
                } else{
                    // define sql statement to be executed
                    $sql = "INSERT INTO users(fname, email, gender, balance) VALUE (:fname, :email, :gender, :balance)";
                    // prepare the sql statement for execution
                    $stmt = $this->db->prepare($sql);
                    // bind all placeholder to actual values
                    $stmt->bindparam(':fname',$fname);
                    $stmt->bindparam(':email',$email);
                    $stmt->bindparam(':gender',$gender);
                    $stmt->bindparam(':balance',$balance);
                    // execute statement
                    $stmt->execute();
                    return true;
                }
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


    

        public function getUsers(){
            try{
                $sql = "SELECT * FROM `users` WHERE 1";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getUserDetails($id){
            try{
                $sql = "SELECT * FROM `users` where users_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getHistory(){
            try{
                $sql = "SELECT * FROM `transfer` WHERE 1";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
       
        //function to delete unwanted record
        public function deleteUsers($id){
            try{
                $sql = "delete from users where users_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        //function to delete unwanted record
        public function deleteHistory($id){
            try{
                $sql = "delete from transfer where transfer_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

       
        public function getUsersbyEmail($email){
            try{
                $sql = "select count(*) as num from users where email = :email";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email',$email);
                
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
            }
        }


        
        

    }
?>