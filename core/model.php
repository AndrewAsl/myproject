<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model {
    
    private $adress;
    private $datapage = [];

    public function __construct() {
        $this->Data();
    }
    
    public function setAdress($adress){
        $this->adress = $adress;
    }
    
    public function run(){
        //echo 'start model for '.$this->adress.'<hr>';
        $this->pdoq();
    }
    
    private function Data(){
        $id=empty($_GET['page'])?1:(int)$_GET['page'];
        $content=array(
            array('id'=>1, 'menu'=>'Страница 1', 'title'=>'Пример страницы 1', 'text'=>'Это главная страница'),
            array('id'=>2, 'menu'=>'Страница 2', 'title'=>'Пример страницы 2', 'text'=>'Это вторая станица по шаблону главной'),
            array('id'=>3, 'menu'=>'Страница 3', 'title'=>'Пример страницы 3', 'text'=>'Можно легко создавать и другие страницы по такому же шаблону ')
        );

        //Извлекаем данные для меню - имитация запроса select id, menu from pages; 
        //если меню посложнее с вложенными меню, то и цикл нужно будет немного усложнить
        foreach ($content as $menuitem)
        {
          $menu[$menuitem['id']]=$menuitem['menu'];
        }
        //Теперь в $menu хранится массив в виде - id=>текст пункта меню:
        //'id'=>1, 'menu'=>'Страница 1'
        //'id'=>2, 'menu'=>'Страница 2'
        //'id'=>3, 'menu'=>'Страница 3'

        //Извлекаем данные страницы - имитация запроса (например для 1-ой страницы) select title, text from pages where id=1
        $index=array_search($id, array_column($content, 'id'));
        $data=array('title'=>$content[$index]['title'], 'text'=>$content[$index]['text']);
        //В $data например если $id==1 теперь будет массив данных страницы
        //'title'=>'Пример страницы 1', 'text'=>'Основной текст страницы 1'
        array_push($this->datapage, $menu, $data);
    }
    
    function pdoq(){
        try
            {
                $pdo = new PDO("mysql:host=localhost;dbname=mydb;charset=utf8", 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = "SELECT * FROM books";
                $result = $pdo->query($query, PDO::FETCH_ASSOC);
                foreach ($result as $row)
                {
                    $this->datapage[] = $row;
                }
                $pdo = NULL; //Закрываем соединение
            }
            catch (PDOException $e)
            {
                echo $e->getMessage();
            }
    }
    
    public function getData() {
        return $this->datapage;        
    }
    
}