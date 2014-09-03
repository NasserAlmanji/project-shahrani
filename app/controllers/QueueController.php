<?php
class QueueController extends BaseController{
    public function add() {

        Queue::push('MyQueue', array());

        echo $_SERVER['SERVER_NAME'];
        echo '<br> already here '.Carbon::now();
    }
}