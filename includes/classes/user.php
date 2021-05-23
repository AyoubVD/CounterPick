<?php
// user.php
class User{
    protected $db;
    protected $user_name;
    protected $user_email;
    protected $user_pass;
    protected $hash_pass;
    function __construct($db_connection){
        $this->db = $db_connection;
    }
 
    // SING UP USER
    function singUpUser($username, $email, $password,$formGender,$rolerank,$bio,$looking){
        try{
            $this->user_name = trim($username);
            $this->user_email = trim($email);
            $this->user_pass = trim($password);
            if(!empty($this->user_name) && !empty($this->user_email) && !empty($this->user_pass)){

                if (filter_var($this->user_email, FILTER_VALIDATE_EMAIL)) { 
                    $check_email = $this->db->prepare("SELECT * FROM `users` WHERE user_email = ?");
                    $check_email->execute([$this->user_email]);

                    if($check_email->rowCount() > 0){
                        return ['errorMessage' => 'This Email Address is already registered. Please Try another.'];
                    }
                    $user_name = $this->db->prepare("SELECT * FROM `users` WHERE username = ?");
                    $user_name->execute([$this->user_name]);
                    if($user_name->rowCount() > 0){
                        return ['errorMessage' => 'This User name is already taken. Please Try another.'];
                    }
                    $user_name = $this->db->prepare("SELECT * FROM `users` WHERE username = ?");
                    $user_name->execute([$this->user_name]);
                    if (!preg_match("/^[a-zA-Z0-9]*$/",$this->user_name)) {
                        return ['errorMessage' => 'Bad name make sure not to have symbols!'];
                    }
                    else{
                        
                        $user_image = $formGender;

                        $this->hash_pass = password_hash($this->user_pass, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO `users` (username, user_email, user_password,looking, user_image,rank,role,team_or_player,bio) VALUES(:looking,:username, :user_email, :user_pass, :user_image,:rank,:role,:team_or_player,:bio)";
            
                        $sign_up_stmt = $this->db->prepare($sql);
                        //BIND VALUES MUST HAVE THESE TO LOG IN
                        $sign_up_stmt->bindValue(':username',htmlspecialchars($this->user_name), PDO::PARAM_STR);
                        $sign_up_stmt->bindValue(':user_email',$this->user_email, PDO::PARAM_STR);
                        $sign_up_stmt->bindValue(':user_pass',$this->hash_pass, PDO::PARAM_STR);
                        // INSERTING whatever you want from database counterpick123
                        $sign_up_stmt->bindValue(':user_image',$user_image.'.png', PDO::PARAM_STR);
                        $sign_up_stmt->bindValue(':rank',$user_image, PDO::PARAM_STR);
                        $sign_up_stmt->bindValue(':role',$rolerank, PDO::PARAM_STR);
                        $sign_up_stmt->bindValue(':team_or_player','player', PDO::PARAM_STR);
                        $sign_up_stmt->bindValue(':bio',$bio, PDO::PARAM_STR);
                        $sign_up_stmt->bindValue(':looking',$looking, PDO::PARAM_STR);
                        $sign_up_stmt->execute();
                        header("location:./error_succeshandels.php?error=none");                  
                    }
                }
                else{
                    return ['errorMessage' => 'Invalid email address!'];
                }    
            }
            else{
                return ['errorMessage' => 'Please fill in all the required fields.'];
            } 
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // LOGIN USER
    function loginUser($email, $password){
        
        try{
            $this->user_email = trim($email);
            $this->user_pass = trim($password);

            $find_email = $this->db->prepare("SELECT * FROM `users` WHERE username = ?");
            $find_email->execute([$this->user_email]);
            
            if($find_email->rowCount() === 1){
                $row = $find_email->fetch(PDO::FETCH_ASSOC);

                $match_pass = password_verify($this->user_pass, $row['user_password']);
                if($match_pass){
                    $_SESSION = [
                        'user_id' => $row['id'],
                        'email' => $row['username']
                    ];
                    header('Location: profile.php');
                }
                else{
                    return ['errorMessage' => 'Invalid password'];
                }
                
            }
            else{
                return ['errorMessage' => 'Invalid Name'];
            }

        }
        catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    // FIND USER BY ID
    function find_user_by_id($id){
        try{
            $find_user = $this->db->prepare("SELECT * FROM `users` WHERE id = ?");
            $find_user->execute([$id]);
            if($find_user->rowCount() === 1){
                return $find_user->fetch(PDO::FETCH_OBJ);
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
    function all_users($id){
        try{
            $get_users = $this->db->prepare("SELECT id, teamname, user_image,looking,win,loss FROM `users` WHERE team_or_player = 'team' and id != ?");
            $get_users->execute([$id]);
            if($get_users->rowCount() > 0){
                return $get_users->fetchAll(PDO::FETCH_OBJ);
            }
            else{
                return false;
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>