<?php

class RecoverPassModel extends DBModel
{

  public function create_user($user_mail)
  {
    $user_pass = str_shuffle($user_mail);
    $this->run_query("INSERT INTO $this->table VALUES (NULL, :user_mail, :user_pass)", ['user_mail' => $user_mail, 'user_pass' => $user_pass]);
  }

  public function recover_pass($user_mail)
  {
    (new RecoverPassModel())->create_user($user_mail);
    
    $result = $this->run_query("SELECT pass FROM $this->table WHERE email = :user_mail", ['user_mail' => $user_mail])->fetch();
    return $result['pass'];
  }
}
