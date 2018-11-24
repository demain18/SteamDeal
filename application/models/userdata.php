<?php

  class Userdata extends CI_Model
  // 클래스명은 대문자로만 시작되어야 한다
  {

    function __construct()
    {
      parent::__construct();
    }

    public function userdata_get($data)
    {
      return $this->db->query("SELECT * FROM userdata WHERE id='$data'");
    }

  }

?>
