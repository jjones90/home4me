<?php
  /**
   * This class provides database abstraction.
   */
  class User extends Dbh {


    public function verifyUserByUsernameAndPassword($username, $password) {
      $usernameEscaped = $this->connection->real_escape_string($username);
      $sql = "SELECT * FROM users WHERE username = '$usernameEscaped'";
      $result = parent::query($sql);
      $row = $result->fetch_assoc();
      $isValidUser = false;
      if (password_verify($password, $row['password'])) {
        $isValidUser = true;
      }
      return $isValidUser;
    }

    public function getLoginVariables($username) {
        $usernameEscaped = $this->connection->real_escape_string($username);
        $sql = "SELECT * FROM users WHERE username = '$usernameEscaped'";
        $result =  parent::query($sql);
        return $result;
    }

    public function doesUsernameExist($username) {
        $usernameEscaped = $this->connection->real_escape_string($username);
        $sql = "SELECT username FROM users WHERE username = '$usernameEscaped'";
        $result =  parent::query($sql);
        $isExist = false;
        if($result->num_rows > 0) {
          $isExist = true;
        }
        return $isExist;
    }

    public function registerUser($username, $password, $email, $usertype) {
        $usernameEscaped = $this->connection->real_escape_string($username);
        $usertypeEscaped = $this->connection->real_escape_string($usertype);
        $sql = "INSERT INTO users (username, password, email, usertype)
        VALUES ('$usernameEscaped','$password', '$email', '$usertypeEscaped')";
        $result =  parent::query($sql);
        return true;
    }

    public function getUserByUsername($username) {
        $usernameEscaped = $this->connection->real_escape_string($username);
        $sql = "SELECT * FROM `users` WHERE `username` ='$usernameEscaped';";
        $result =  parent::query($sql);
        return $result;
    }

    public function getUserProfileInfo($username) {
        $sql = "SELECT * FROM `users` WHERE `username` ='$username';";
        $result =  parent::query($sql);
        return $result;
    }

    public function updateLogo($id, $imgurl) {
        $sql = "UPDATE `users` SET imgurl = '$imgurl' WHERE id = '$id';";
        $result =  parent::query($sql);
        return true;
    }


    public function getImgURL($userid) {
        $sql = "SELECT imgurl FROM `users` WHERE `id` ='$userid';";
        $result =  parent::query($sql);
        return $result;
    }

    public function getUserId($userid) {
        $sql = "SELECT id FROM `users` WHERE `id` ='$userid';";
        $result =  parent::query($sql);
        return $result;
    }

    public function deleteAccount($userid) {
        $sql = "DELETE FROM users WHERE `id` ='$userid';";
        $result =  parent::query($sql);
        return $result;
    }

  }
 ?>
