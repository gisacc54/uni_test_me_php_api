<?php


class User
{
    private $name;
    private $email;
    private $table = 'users';


    public function createUser($name,$email,$password,$conn){
        $hashed_password = sha1($password);
        $sql = "INSERT INTO $this->table (`name`, `email`, `password`) VALUES ('$name','$email','$hashed_password')";

        $result = mysqli_query($conn,$sql);
        if($result){
            $response = json_encode(['success'=>true,'message'=>'Account created']);
            header('Content-Type: application/json');
            return $response;
        }
        else{
            if (strpos(mysqli_error($conn),'Duplicate entry') !== false)
                $response = json_encode(['success'=>false,'message'=>'Email already exist']);
            else
                $response = json_encode(['success'=>false,'message'=>'Fail to create account']);
            header('Content-Type: application/json');
            return $response;
        }

    }
    public function login($email,$password,$conn){
        $hashed_password = sha1($password);
        $sql = "SELECT * FROM  users where email = '$email' and password = '$hashed_password'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            echo "Login Successful";
        } else {
            echo "Login Fail";
        }
    }
}