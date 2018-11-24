<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Process extends CI_Controller
  {
      function __construct()
      {
        parent::__construct();
        $this->load->database();
      }

      function register()
      {
        // ini_set('display_errors', '0');

        // 에러코드 안보이게 함

        // $data = $this->security->xss_clean($email);
        $email = $this->security->xss_clean($_POST['email']);
        $nickname = $this->security->xss_clean($_POST['nickname']);
        $id = $this->security->xss_clean($_POST['id']);
        $pw = $this->security->xss_clean($_POST['pw']);
        $pwc = $this->security->xss_clean($_POST['pwc']);
        $statement_check = $_POST['statement_check'];
        /*
        echo $email;
        echo $nickname;
        echo $id;
        echo $pw;
        echo $pwc;
        echo $statement_check;
        */
        if($email==NULL || $nickname==NULL || $id==NULL || $pw==NULL || $pwc==NULL)
        {
          echo("<script>alert('빈칸을 모두 채워주세요.')</script>");
          echo("<script>location.replace('/SteamDeal/main/index');</script>");
        }

        if($statement_check==0)
        {
          echo("<script>alert('사용약관을 체크해주세요.')</script>");
          echo("<script>location.replace('/SteamDeal/main/index');</script>");
        }
        if($pw!=$pwc)
        {
          echo("<script>alert('비밀번호와 비밀번호 재입력이 다릅니다.')</script>");
          echo("<script>location.replace('/SteamDeal/main/index');</script>");
        }
        // 회원가입 규정 complete
        $sql = "SELECT * FROM userdata WHERE id='$id'";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
          echo("<script>alert('이미 등록된 아이디입니다.')</script>");
        }

        $ip = $_SERVER['REMOTE_ADDR'];
        $pw = md5($pw);
        // 사용자 아이피 수집
        $sql = "
        INSERT INTO userdata
        (bz_email, nickname, id, pw, ip)
        VALUES(
            '$email',
            '$nickname',
            '$id',
            '$pw',
            '$ip'
        )
        ";
        // $result = mysqli_query($conn, $sql);
        $result = $this->db->query($sql);
        if($result == false) {
          echo("<script>alert('오류가 발생했습니다, 관리자에게 문의해주세요.')</script>");
          echo("<script>location.replace('/SteamDeal/main/index');</script>");
        }
        echo("<script>alert('회원가입에 성공했습니다.')</script>");
        echo("<script>location.replace('/SteamDeal/main/index');</script>");
      }

      function login()
      {
        $id = $this->security->xss_clean($_POST['id']);
        $pw = $this->security->xss_clean($_POST['pw']);

        $sql = "SELECT * FROM userdata WHERE id='$id'";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {

          $pw = md5($pw);
          $sql = "SELECT * FROM userdata WHERE pw='$pw'";
          $query = $this->db->query($sql);
          if($query->num_rows() > 0) {

            $query = $this->db->query("SELECT * FROM userdata WHERE id='$id'");
            foreach ($query->result() as $row)
            {
                    $nickname = $row->nickname;
            }
            session_start();
            $_SESSION["user_nickname"] = "{$nickname}";
            $_SESSION["user_id"] = "{$id}";
            $_SESSION["user_situation"] = "online";
            // echo("<script>alert('로그인성공.')</script>");
            echo("<script>location.replace('/SteamDeal/main/index');</script>");


          } else {
            echo("<script>alert('비밀번호가 틀립니다.')</script>");
            echo("<script>location.replace('/SteamDeal/main/index');</script>");
          }
        } else {
          echo("<script>alert('아이디가 틀립니다.')</script>");
          echo("<script>location.replace('/SteamDeal/main/index');</script>");
        }
      }

      function logout()
      {
        session_start();
        session_destroy();
        echo("<script>location.replace('/SteamDeal/main/index');</script>");
      }

      function item_upload()
      {
        $platform = $this->security->xss_clean($_POST['platform']);
        $img = $this->security->xss_clean($_POST['img']);
        $explain = $this->security->xss_clean($_POST['explain']);
        $price = $this->security->xss_clean($_POST['price']);
        $payway_bz_link = $this->security->xss_clean($_POST['payway_bz_link']);
        $payway_tel = $this->security->xss_clean($_POST['payway_tel']);

        $steamlink = $this->security->xss_clean($_POST['steamlink']);
        $gamecount = $this->security->xss_clean($_POST['game_count']);
        $gamelist = $this->security->xss_clean($_POST['game_list']);

        echo '플랫폼 : '.$platform.'<br />';
        echo '계정설명 : '.$explain.'<br />';
        echo '가격 : '.$price.'<br />';
        echo '번장링크 : '.$payway_bz_link.'<br />';
        echo '연락처 : '.$payway_tel.'<br />';
        echo '<br />';
        echo '스팀링크 : '.$steamlink.'<br />';
        echo '게임개수 : '.$gamecount.'<br />';
        echo '게임리스트 : '.$gamelist[0].'<br />';
        exit();
      }

      function scraping()
      {
        require('module/simplehtmldom/simple_html_dom.php');

        session_start();
        // $param1 = $this->security->xss_clean($_POST['param1'])
        $param1 = substr($_POST['param1'], 23);
        $param1 = urldecode($param1);

        $steamlink = $param1;

        if(!$param1) {
          throw new exception('param1 값이 없습니다.');
        }

        $html = file_get_html($param1);
        foreach($html->find('script') as $element)
        $str = $element->innertext;
        $res = strstr($str, 'var rgGames');
        if (preg_match('/var rgGames =(.*?)var rgChangingGames = /', $res, $result)) {
            $result = $result[1];
        }
        $gamelist = substr($result, 0, -5);
        // echo $gamelist;
        $result = array();
        $result['success']	= true;
        $result['data']	= $gamelist;
        $result['steamlink'] = $steamlink;
        echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
      }

      function autocomplete_search()
      {
        header("Content-Type: application/json");

        /*
    		$query = $this->db->get('games');
    			foreach ($query->result() as $row)
    			{
    				$tmp1 = $row->name;
    				echo '"'.$tmp1.'", ';
    			}
        */
        $term = $_GET['term'];
        $item	= array();
        $query = $this->db->query("SELECT * FROM `games` WHERE `name` LIKE '%$term%' LIMIT 8");
    		foreach ($query->result() as $row)
    		{
    			$tmp1 = $row->name;
    			// echo '"'.$tmp1.'", ';
          array_push($item, $tmp1);
    		}

        echo json_encode($item);
      }

  }
?>
