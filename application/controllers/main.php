<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Main extends CI_Controller
  {
      function __construct()
      {
        parent::__construct();
        $this->load->database();
      }
      /* StealDeal/... index, dashboard, item, sell */
      function index()
      {
        $data['style_sheet_index'] = "index.css";
        // echo 'This is index.';
        $this->load->view('Header', $data);
        $this->load->view('Index');
        $this->load->view('Footer');
      }

      function dashboard()
      {
        $data['style_sheet_index'] = "dashboard.css";
        // echo 'This is index.';
        $this->load->view('Header', $data);
        $this->load->view('Dashboard');
        $this->load->view('Footer');
      }

      function item()
      {
        $data['style_sheet_index'] = "item.css";
        // echo 'This is index.';
        $this->load->view('Header', $data);
        $this->load->view('Item');
        $this->load->view('Footer');
      }

      function sell()
      {
        $this->load->library('javascript');
        $this->load->library('javascript/jquery');

        $data['style_sheet_index'] = "sell.css";
        $game_calc = $this->load->view('Game_calc');
        // echo 'This is index.';
        $this->load->view('Header', $data);
        $this->load->view('Sell');
        $this->load->view('Footer', $game_calc);
      }

      function scraping()
      {

        require('simplehtmldom/simple_html_dom.php');

        echo $_POST['param1'];
        // $steam_game_list = json_decode($_POST['steam_profilesite_link'], true);
        // echo $steam_game_list;
        exit();
        $param1 = json_decode($_POST['steam_profilesite_link'], true);
    		if(!$param1) {
    			throw new exception('steam_game_link 값이 없습니다.');
    		}

        exit();

        $steam_game_list = json_decode($input, true);
        echo $steam_game_list;

        exit();

        // $html = file_get_html('https://steamcommunity.com/profiles/76561198083940699/games/?tab=all');
        $html = file_get_html($_POST('steam_profilesite_link'));
        // 스팀 프로필->게임 주소 넣는곳
        foreach($html->find('script') as $element)
        $str = $element->innertext;
        $res = strstr($str, 'var rgGames');
        if (preg_match('/var rgGames =(.*?)var rgChangingGames = /', $res, $result)) {
            $result = $result[1];
        }
        $result = substr($result, 0, -5);
        $steam_game_list = json_encode($result, true);
        // echo $result;
        /*
        echo '<script>
          var game_list = '.$result.';

          for(var i = 0; i < game_list.length; i++) {
            console.log(game_list[i].appid);
            console.log(game_list[i].name);
            console.log(game_list[i].hours_forever);

            document.write("<h3>"+game_list[i].name+"</h3>");
          }
        </script>';
        */

      }

      function ajax_shot()
      {
        $this->load->view('ajax_test');
      }

      function ajax_get()
      // header('Content-Type: text/html; charset=UTF-8');
      // header('Content-Type:application/json; charset=UTF-8');
      {
    		## param1
    		$param1 = $_POST['param1'];
    		if(!$param1) {
    			throw new exception('param1 값이 없습니다.');
    		}
    		## param2
    		$param2 = $_POST['param2'];
    		if(!$param2) {
    			throw new exception('param2 값이 없습니다.');
    		}

        $param3 = $_POST['param3'];
        $param3 = substr($param3, 23);
        $param3 = urldecode($param3);
    		if(!$param3) {
    			throw new exception('param3 값이 없습니다.');
    		}
        /*
        $param3 = json_decode($param3, true);
        if($param3 == null) {
          $param3 = json_last_error();
        }
        */

    		## 합
    		$sum = $param1 + $param2;
    		## 마무리
    		$result['success']	= true;
    		$result['data']		= "{$param1} 더하기 {$param2} 는 {$sum}이다 {$param3}";
        echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
      }
  }
?>
