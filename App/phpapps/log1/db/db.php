<?php
  require_once('menu/menu.php');
  class db{
    public function makeMenu(){
        $menu = new menu();
        $m = $menu->giveMenu();
        $menu->generateMenu();
        print_r($m);
    }
  }
?>