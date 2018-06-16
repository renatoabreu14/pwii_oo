<?php
class Conexao{

    private static $instance;

    private function __construct(){

    }

    /**
     * @return mixed
     */
    public static function getInstance(){
        if (!isset(self::$instance)){
            self::$instance = new PDO('mysql:host=localhost;dbname=pw2_2018',
                'phpmyadmin', 'arthur14');
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}