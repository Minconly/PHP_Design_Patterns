<?php
header("Content-type: text/html; charset=utf-8");
/**
 * 抽象出来的模板类
 */
abstract class FlowTemplate {
    //模板初始传入参数
    public $params;
    public function __construct($params){
        $this->params = $params;
    }

    //流程的模板方法 
    public function startFlow(){
        $this->flowState1();
        $this->flowState2();
        $this->flowState3();
        echo $this->params."流程执行结束</br>";
    }
    //固定的执行流程
    public abstract function flowState1();  
    public abstract function flowState2(); 
    public abstract function flowState3(); 
}

//调用模板，执行请假流程
class AskForLeavFlow extends FlowTemplate{
    //实现模板的抽象方法
    public function flowState1(){
        echo $this->params."提交请假单</br>";
    }

    public function flowState2(){
        echo $this->params."审批通过</br>";
    }


    public function flowState3(){
        echo $this->params."请假成功</br>";
    }
}

class ValidateFlow extends FlowTemplate{

    public function flowState1(){
        echo $this->params."步骤一</br>";
    }


    public function flowState2(){
        echo $this->params."步骤二</br>";
    }


    public function flowState3(){
        echo $this->params."步骤三</br>";
    }
}

$leave = new AskForLeavFlow('请假流程:');
$leave->startFlow();

$validate = new ValidateFlow('demo:');
$validate->startFlow();
?>
