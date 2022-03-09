<?php
require "database.php";


class User extends Database {
    private string $username;
    private string $password;

    public function __construct(string $username, string $password) {
        parent::__construct();
        $this->username = $username;
        $this->password = $password;
    }

    public function login() {
        $this->prepare("SELECT * FROM users WHERE username = :username");
        $this->bind(":username", $this->username);
        $this->execute();
        $user = $this->fetch();

        if($user) {
            if(password_verify($this->password, $user['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['userid'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: ../index.php");
            } else {
                header("Location: ../login.php?fail=true");
            }
        } else {
            header("Location: ../login.php?fail=true");
        }
    }

    private function does_username_exist() {
        $this->prepare("SELECT * FROM users WHERE username = :username");
        $this->bind(":username", $this->username);
        $this->execute();
        $user = $this->fetch();

        return true ? $user : false;
    }

    public function register() {
        if($this->does_username_exist()) {
            header("Location: ../register.php?fail=true&used=true");
        } else {
            try {
                $this->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
                $this->bind(":username", $this->username);
                $this->bind(":password", password_hash($this->password, PASSWORD_DEFAULT));
                $this->execute();
                header("Location: ../login.php?success=true");
            }
            catch(PDOException $exception) {
                header("Location: ../register.php?fail=true");
            }
        }
    }
}

?>