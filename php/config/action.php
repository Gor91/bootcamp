<?php
include "const.php";

class Db
{
    private $conn;
    /**
     * Db constructor.
     */
    public function __construct()
    {
        $servername = "localhost";
        $username = "phpmyadmin";
        $password = "test1234";
        $this->conn = new mysqli($servername, $username, $password);
        $query = "CREATE DATABASE IF NOT EXISTS eif_bootcamp";
        if ($this->conn->query($query)) {
            $query = "USE eif_bootcamp";
        } else {
            echo $this->conn->error;
        }
        $this->conn->query($query);
    }

    /**
     * @param $id
     * @return array
     */
    public function getUser($id)
    {
        $query = "SELECT * FROM `user` WHERE `id` =" . $id . "";
        $res = $this->conn->query($query);
        $res = $res->fetch_assoc();
        if ($res) {
            session_start();
            $_SESSION["full_data"]["user_data"] = $res;
            return $res;
        } else {
            echo "ERROR";
        }
    }

    /**
     * @param $data
     */
    public function login($data)
    {
        $query = "SELECT * FROM `user` WHERE `email` ='" . $data["email"] . "' AND
            `password` = md5('" . $data['pass'] . "')";

        $res = $this->conn->query($query);
        $res = $res->fetch_assoc();
        if ($res && $res["user_role"] == "admin") {
            $query = "SELECT 
                            learning.`id` AS learning_id,
                            learning.`name` AS learning_name,
                            learning.`img_path` AS learning_path,
                            learning.`link` AS learning_link,
                            category.`id` AS category_id,
                            category.`name` AS category_name
                            
                         FROM learning INNER JOIN category ON learning.category_id=category.id";
            $category = $this->conn->query($query);
            $category_data = [];
            if ($category->num_rows > 0) {
                while ($row = $category->fetch_assoc()) {
                    $category_data[$row["category_id"]][] = $row;

                }
            }
            $full_data = ["status" => "admin_login", "category" => $category_data];
            session_start();
            $_SESSION["full_data"] = $full_data;
            echo json_encode($full_data);
            return;
        }
        if ($res) {
            if ($res["status"] == 0) {
                $full_data = ["user_data" => $res, "status" => "first_login", "pass" => $data['pass']];
                session_destroy();
                session_start();
                $_SESSION["full_data"] = $full_data;
                echo json_encode($full_data);
            } else if ($res["status"] == 1) {

                $full_data = ["user_data" => $res, "status" => "registered_user", "pass" => $data['pass']];
                session_destroy();
                session_start();
                $_SESSION["full_data"] = $full_data;
                echo json_encode($full_data);
            } else {
                echo "user_not_found";
            }
        } else {
            echo json_encode("user_not_found");
        }
    }

    /**
     * @param $data
     */
    public function get_learning_data($data)
    {
        $query = "SELECT `id`, `category_id`, `name`, `img_path`, `link`, `created_at` FROM `learning` WHERE id =" . $data["id"];
        $res = $this->conn->query($query);
        $res = $res->fetch_assoc();
        echo json_encode($res);
    }

    public function get_categores()
    {
        $query = "SELECT 
                            learning.`id` AS learning_id,
                            learning.`name` AS learning_name,
                            learning.`img_path` AS learning_path,
                            learning.`link` AS learning_link,
                            category.`id` AS category_id,
                            category.`name` AS category_name
                            
                         FROM learning INNER JOIN category ON learning.category_id=category.id";
        $category = $this->conn->query($query);
        $category_data = [];
        if ($category->num_rows > 0) {
            while ($row = $category->fetch_assoc()) {
                $category_data[$row["category_id"]][] = $row;

            }
        }
        return $category_data;
    }

    /**
     * @param $data
     */
    public function add_learning($data)
    {
        session_start();
        $name = $data["data"]["learning_name"];
        $link = $data["data"]["learning_link"];
        $cat_id = $data["data"]["selected_id"];
        $img_path = $_SESSION["admin_img_tmp_path"];
        $query = "INSERT INTO `learning`(category_id, name, img_path, link) VALUES ('$cat_id' ,'$name', '$img_path', '$link')";
        $res = $this->conn->query($query);
        if ($res) {
            $query = "SELECT 
                            learning.`id` AS learning_id,
                            learning.`name` AS learning_name,
                            learning.`img_path` AS learning_path,
                            learning.`link` AS learning_link,
                            category.`id` AS category_id,
                            category.`name` AS category_name
                            
                         FROM learning INNER JOIN category ON learning.category_id=category.id";
            $category = $this->conn->query($query);
            $category_data = [];
            if ($category->num_rows > 0) {
                while ($row = $category->fetch_assoc()) {
                    $category_data[$row["category_id"]][] = $row;

                }
            }
            $full_data = ["status" => "admin_login", "category" => $category_data];
            $_SESSION["full_data"] = $full_data;
            echo json_encode("succesfulli_created");
        } else {
            echo json_encode("error");
        }
    }

    /**
     * @param $data
     */
    public function edit_learning($data)
    {
        session_start();
        $name = $data["data"]["learning_name"];
        $link = $data["data"]["learning_link"];
        $cat_id = $data["data"]["selected_id"];
        $learn_id = $data["data"]["learning_id"];
        $img_path = $_SESSION["admin_img_tmp_path"];
        if ($data["data"]["img_status"]) {
            $query = "UPDATE learning SET category_id =$cat_id, name = '$name', img_path = '$img_path',link = '$link'
                             WHERE id= $learn_id";

        } else {
            $query = "UPDATE learning SET category_id =$cat_id, name = '$name' ,link = '$link'
                             WHERE id = $learn_id";
        }
        $res = $this->conn->query($query);
        if ($res) {
            $query = "SELECT 
                            learning.`id` AS learning_id,
                            learning.`name` AS learning_name,
                            learning.`img_path` AS learning_path,
                            learning.`link` AS learning_link,
                            category.`id` AS category_id,
                            category.`name` AS category_name
                            
                         FROM learning INNER JOIN category ON learning.category_id=category.id";
            $category = $this->conn->query($query);
            $category_data = [];
            if ($category->num_rows > 0) {
                while ($row = $category->fetch_assoc()) {
                    $category_data[$row["category_id"]][] = $row;
                }
            }
            $full_data = ["status" => "admin_login", "category" => $category_data];
            $_SESSION["full_data"] = $full_data;
            echo json_encode("succesfulli_edited");
        } else {
            echo json_encode("error");
        }
    }

    /**
     * @param $data
     */
    public function editUser($data)
    {
        if ($data["action"] == "first_login") {
            $email = $data["data"]["email"];
            $f_name = $data["data"]["f_name"];
            $l_name = $data["data"]["l_name"];
            $company_name = $data["data"]["company_name"];
            $description = $data["data"]["description"];
            $password = $data["data"]["password"];
            $confirm_password = $data["data"]["confirm_password"];
            //check if mail exist on db
            $checkQuery = "SELECT * FROM user WHERE email='$email'";
            $check = $this->conn->query($checkQuery);
            $check_email_exist = $check->fetch_assoc();
            if ($check_email_exist) {
                //check password and confirm password equals
                if ($password == $confirm_password) {
                    $query = "UPDATE user SET f_name ='$f_name', l_name = '$l_name', company_name = '$company_name',
                            description= '$description' , status=1, `password` = md5('" . $password . "') WHERE email= '$email'";
                    $res = $this->conn->query($query);
                    if ($res) {
                        $check = $this->conn->query($checkQuery);
                        $check_email_exist = $check->fetch_assoc();
                        $full_data = ["user_data" => $check_email_exist, "status" => "registered_user"];
                        $_SESSION["full_data"] = $full_data;
                        echo json_encode($full_data);
                    }
                } else {
                    echo json_encode("password_not_equal");
                }
            } else {
                echo json_encode("email_not_found");
            }
        }
        if ($data["action"] == "edit_from_profile") {
            $email = $data["data"]["email"];
            $f_name = $data["data"]["f_name"];
            $l_name = $data["data"]["l_name"];
            $company_name = $data["data"]["company_name"];
            $description = $data["data"]["description"];
            //check if mail exist on db
            $checkQuery = "SELECT * FROM user WHERE email='$email'";
            $check = $this->conn->query($checkQuery);
            $check_email_exist = $check->fetch_assoc();
            if ($check_email_exist) {
                //check password and confirm password equals
                $query = "UPDATE user SET f_name ='$f_name', l_name = '$l_name', company_name = '$company_name',
                            description= '$description'  WHERE email= '$email'";
                $res = $this->conn->query($query);
                if ($res) {
                    $check = $this->conn->query($checkQuery);
                    $check_email_exist = $check->fetch_assoc();
                    $full_data = ["user_data" => $check_email_exist, "status" => "registered_user"];
                    $_SESSION["full_data"] = $full_data;
                    echo json_encode($full_data);
                }
            } else {
                echo json_encode("email_not_found");
            }
        }
    }

    /**
     * @param $id
     * @param $path
     * @param $field_name
     */
    public function setFilePath($id, $path, $field_name)
    {
        $query = "UPDATE user SET " . $field_name . "='$path' WHERE id=" . $id . "";
        $res = $this->conn->query($query);
        if ($res) {
            $response = ["status" => "file_saved", "type" => $field_name, "img_path" => "http://bootcamp.eif.am/" . $path];
            echo json_encode($response);
        } else {
            echo $this->conn->error;
        }
    }

    /**
     * @param $data
     */
    public function edit_video_status($data)
    {
        $status_video = $data["change"];
        $query = "UPDATE user SET video_status ='$status_video'";
        $res = $this->conn->query($query);
        if ($res) {
            echo json_encode("status_changed");
        }
    }

    /**
     * @return array
     */
    public function get_video_status()
    {
        $query = "SELECT `video_status` FROM `user` WHERE 1";
        $res = $this->conn->query($query);
        $v_s = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $v_s[0] = $row;
            }
        }
        return $v_s;
    }

    /**
     * @param $data
     */
    public function see_profile($data)
    {
        $id = $data["id"];
        $query = "SELECT * FROM `user` WHERE `id`= $id";
        $res = $this->conn->query($query);
        if ($res->num_rows > 0) {
            $res = $res->fetch_assoc();
            echo json_encode($res);
        }
    }

    /**
     * log out
     */
    public function sign_out()
    {
        session_start();
        session_unset();
        echo json_encode("log_out");
    }

}

