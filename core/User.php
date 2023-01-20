<?php

class User extends Connection
{
    public $err_msg;

    public function getUser($id)
    {
//        $sql = "SELECT * FROM users WHERE id = :id";
        $sql = "SELECT u.*, COUNT(p.id) as num_post
                FROM users u
                JOIN posts p ON p.user_id = u.id
                WHERE u.id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(["id" => $id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function isLogged()
    {
        return isset($_SESSION["id"]);
    }

    public function login($data)
    {
        $user = $this->isExist($data["email"]);
        if ($user) {
            if (password_verify($data["password"], $user->password)) {
                $_SESSION["id"] = $user->id;
                return true;
            } else {
                $this->err_msg = "Wrong password!";
                return false;
            }
        } else {
            $this->err_msg = "Wrong email!";
            return false;
        }
    }

    public function register($data)
    {
        if ($this->isExist($data["email"])) {
            $password_hash = password_hash($data["password"], PASSWORD_DEFAULT);
            $data["role"] = "user";
            $data["password"] = $password_hash;

            $sql = "INSERT INTO users (title, first_name, last_name, role, email, password) 
                    VALUES (:title, :first_name, :last_name, :role, :email, :password)";
            $query = $this->db->prepare($sql);
            $query->execute($data);
            if ($query->rowCount() === 1) {
                return true;
            } else {
                $this->err_msg = "User not register";
                return false;
            }
        } else {
            $this->err_msg = "User with this email exist!";
            return false;
        }
    }


    private function isExist($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $query = $this->db->prepare($sql);
        $query->execute(["email" => $email]);
        if ($query->rowCount() === 1) {
            return $query->fetch(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }


    public function changeTitle($id)
    {
        $user = $this->getUser($id);
        $title = "mr";
        if ($user->title === $title) {
            $title = "ms";
        }
        $sql = "UPDATE users 
                SET 
                    title = :title,
                    updated_at = NOW()
                WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute([
            "id" => $id,
            "title" => $title
        ]);
        if ($query->rowCount() === 1) {
            return true;
        }
        return false;
    }

    public function changeName($data)
    {
        $sql = "UPDATE users SET 
                 first_name = :first_name,
                 last_name = :last_name,
                 updated_at = NOW()
                 WHERE id = :id
                 ";
        $query = $this->db->prepare($sql);
        $query->execute($data);
        return $query->rowCount() === 1;
    }

    public function changePassword($data)
    {

        $user = $this->isExist($data["email"]);
        if (password_verify($data["old_password"], $user->password)) {
            $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
            $sql = "UPDATE users SET 
                 password = :password,
                 updated_at = NOW()
                 WHERE email = :email
                 ";
            $query = $this->db->prepare($sql);
            $query->execute([
                "password" => $data["password"],
                "email" => $data["email"]
            ]);
            if ($query->rowCount() === 1) {
                return true;
            } else {
                $this->err_msg = "Password not changed, something wrong with server!";
                return false;
            }
        } else {
            $this->err_msg = "Old password is wrong!";
            return false;
        }
    }


}


$User = new User(config);