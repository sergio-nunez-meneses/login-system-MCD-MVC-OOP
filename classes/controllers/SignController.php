<?php

class SignController
{

  public static function sign_forms()
  {
    return SignView::display();
  }

  public static function sign_up($inputs)
  {
    $error = FALSE;
    $user_id = $username = $password = $folder_name = $success_msg = $error_msg = '';

    if (empty($inputs['username']))
    {
      $error = TRUE;
      $error_msg .= 'username cannot be empty';
    }
    elseif (strlen($inputs['username']) < 3)
    {
      $error = TRUE;
      $error_msg .= 'username must contain more than 6 characters';
    }
    else
    {
      $username = filter_var($inputs['username'], FILTER_SANITIZE_STRING);
    }

    if (empty($inputs['folder-name']))
    {
      $error = TRUE;
      $error_msg .= 'folder name cannot be empty';
    }
    elseif (strlen($inputs['folder-name']) < 6)
    {
      $error = TRUE;
      $error_msg .= 'folder name must contain more than 6 characters';
    }
    else
    {
      $folder_name = filter_var($inputs['folder-name'], FILTER_SANITIZE_STRING);
    }

    if (empty($inputs['password']))
    {
      $error = TRUE;
      $error_msg .= 'password cannot be empty';
    }
    elseif (strlen($inputs['password']) < 6)
    {
      $error = TRUE;
      $error_msg .= 'password must contain more than 6 characters';
    }
    elseif (!preg_match("#[0-9]+#", $inputs['password']))
    {
      $error = TRUE;
      $error_msg .= 'password must contain at least one number!';
    }
    elseif (!preg_match("#[a-z]+#", $inputs['password']))
    {
      $error = TRUE;
      $error_msg .= 'password must contain at least one lowercase character!';
    }
    elseif (!preg_match("#[A-Z]+#", $inputs['password']))
    {
      $error = TRUE;
      $error_msg .= 'password must contain at least one uppercase character!';
    }
    elseif (!preg_match("#\W+#", $inputs['password']))
    {
      $error = TRUE;
      $error_msg .= 'password must contain at least one symbol!';
    }
    elseif ($inputs['password'] !== $inputs['confirm-password'])
    {
      $error = TRUE;
      $error_msg .= 'passwords do not match';
    }
    else
    {
      $options = [
        'cost' => 12,
      ];
      $password = password_hash($inputs['password'], PASSWORD_BCRYPT, $options);
    }

    if ($error === FALSE)
    {
      $sign_model = new SignModel();

      if ($sign_model->user_exists($username) === FALSE)
      {
        $user_id = $sign_model->create_new_user($username, $password);
        $sign_model->create_user_folder($user_id, $folder_name);

        $_SESSION['user'] = $username;
        $_SESSION['folder'] = $folder_name;
        $_SESSION['logged_in'] = true;

        $success_msg .= 'connexion successful! <br>';
        $response = IndexController::main_folder($success_msg);
        return $response;
      }
      else
      {
        $error_msg .= 'username already exists';
        echo $error_msg;
      }
    }
    else
    {
      echo $error_msg;
    }
  }

  public static function sign_in($inputs)
  {
    $error = FALSE;
    $get_user = $username = $password = $stored_password = $success_msg = $error_msg = '';

    if (empty($inputs['username']))
    {
      $error = TRUE;
      $error_msg .= 'username cannot be empty <br>';
    }
    else
    {
      $username = $inputs['username'];
    }

    if (empty($inputs['password']))
    {
      $error = TRUE;
      $error_msg .= 'password cannot be empty <br>';
    }
    else
    {
      $password = $inputs['password'];
    }

    if ($error === FALSE)
    {
      $sign_model = new SignModel();
      $get_user = $sign_model->get_user($username);

      if ($get_user === FALSE)
      {
        $error_msg .= 'user does not exist <br>';
        echo $error_msg;
      }
      else
      {
        $stored_password = $get_user['pass'];

        if (password_verify($password, $stored_password))
        {
          $user_id = $get_user['id'];
          $username = $get_user['name'];
          $folder_name = $sign_model->get_folder($user_id);

          $_SESSION['user'] = $username;
          $_SESSION['folder'] = $folder_name;
          $_SESSION['logged_in'] = TRUE;

          $success_msg .= 'connexion successful! <br>';
          $response = IndexController::main_folder($success_msg);
          return $response;
        }
        else
        {
          $error_msg .= 'password incorrect <br>';
          echo $error_msg;
        }
      }
    }
    else
    {
      echo $error_msg;
    }
  }

  public static function sign_out()
  {
    session_unset();
    session_destroy();
    return SignController::sign_forms();
  }
}
