<?php

class RecoverPassView
{

  public static function display()
  {
    ?>
    <div class="container w-50 my-5 p-5 border rounded bg-dark text-white">
      <div id="responseContainer"></div>
      <h4 class="py-3 text-center">Recover password</h4>
      <div class="form-group">
        <input class="form-control" type="mail" name="user-mail" placeholder="Enter your email address">
      </div>
      <div class="form-group">
        <button class="w-100 btn btn-md bg-primary text-white" type="button" name="recover-btn">Recover</button>
      </div>
    </div>
    <?php
  }
}
