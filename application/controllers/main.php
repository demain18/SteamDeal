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

        $this->load->view('Header', $data);
        $this->load->view('Sell');
        $this->load->view('Footer', $game_calc);
      }

      function scraping()
      {
        require('simplehtmldom/simple_html_dom.php');


        $param1 = substr($_POST['param1'], 23);
        $param1 = urldecode($param1);
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
        $result['data']		= $gamelist;
        echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

      }

      function ajax_shot()
      {
        $this->load->view('ajax_test');
      }

      function ajax_get()
      {
        $param1 = substr($_POST['param1'], 23);
        $param1 = urldecode($param1);
        if(!$param1) {
          throw new exception('param1 값이 없습니다.');
        }

        $result['success']	= true;
        $result['data']		= "게임목록 : $param1";
        echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
      }
  }
?>
