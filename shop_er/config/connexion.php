<?php


try{
    $access=new pdo("mysql:host=localhost;dbname=shop_er;charset=utf8","root","");

}
catch (Exception $e){
    $e->getMessage();
}