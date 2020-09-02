<?php

class SignModel extends Database
{

  public function user_exists($username)
  {
    $stmt = $this->run('SELECT name FROM users WHERE name = :username', ['username' => $username]);
    $user = $stmt->fetch();

    if ($username === $user['name'])
    {
      return true;
    } else
    {
      return false;
    }
  }

  public function create_new_user($username, $password)
  {
    $stmt = $this->run('INSERT INTO users (id, name, pass) VALUES (NULL, :username, :password)', ['username' => $username, 'password' => $password]);
    $result = $stmt->fetch();
    return $result['LAST_INSERT_ID()'];
  }

  public function create_user_folder($user_id, $folder_name)
  {
    $stmt = $this->run('INSERT INTO main_folder (id, folder_name) VALUES (:user_id, :folder_name)', ['user_id' => $user_id, 'folder_name' => $folder_name]);
    // $result = $stmt->fetch();
    // return $result['LAST_INSERT_ID()'];
  }

  public function get_user($username)
  {
    $stmt = $this->run('SELECT * FROM users WHERE name = :username', ['username' => $username]);
    $user = $stmt->fetch();
    return $user;
  }

  public function get_folder($user_id)
  {
    $stmt = $this->run('SELECT folder_name FROM main_folder WHERE id = :user_id', ['user_id' => $user_id]);
    $folder_name = $stmt->fetch();
    return $folder_name['folder_name'];
  }
}
