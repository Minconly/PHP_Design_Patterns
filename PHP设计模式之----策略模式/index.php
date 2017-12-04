<?php
/**
 * 策略模式
 * 使用场景:一个类有共同点，但也有不同点，在某个行为上需要执行不同的算法的时候
 */



//行为接口A
interface BehaviorA{
    public function horn();
}

//可以按喇叭行为的实现
class canHorn implements BehaviorA{
    public function horn(){
        echo "这辆车可以按喇叭</br>";
        echo "执行可以按喇叭的算法</br>";
    }
}

//不可以按喇叭的行为实现
class notHorn implements BehaviorA{
    public function horn(){
        echo "这辆车不能按喇叭</br>";
        echo "执行不能按喇叭的算法!</br>";
    }
}


//行为接口B
interface BehaviorB{
    public function fly();
}

//同种行为的不同算法实现
//这车能飞
class canFly implements BehaviorB{
    public function fly(){
        echo "这车可以飞---";
        echo "执行可以灰的算法</br>";
    }
}

//这车不能飞
class notFly implements BehaviorB{
    public function fly(){
        echo "这车不能飞---";
        echo "执行不能飞的算法</br>";
    }
}


class Car{
    private $_hornBehavior;

    public function clickHorn(){
        $this->_hornBehavior->horn();
    }

    //设置按喇叭行为的执行算法
    public function setHornBehavior(BehaviorA $behavior){
        $this->_hornBehavior = $behavior;
    }


}

class GameCar extends Car{
    public $carType;
    //是否能飞行的算法
    private $flyBehavior;

    public function __construct($carType){
        echo "这是".$carType;
    }

    public function goFly(){
        $this->flyBehavior->fly();
    }

    public function setFlyBehavior(BehaviorB $behavior){
        $this->flyBehavior = $behavior;   
    }

}



$jeep  = new GameCar("Jeep");
//设置车可以按喇叭
$jeep->setHornBehavior(new canHorn());
$jeep->clickHorn();
//设置车不能飞
$jeep->setFlyBehavior(new notFly());
$jeep->goFly();

$bengbeng = new GameCar("BengBeng");
//设置车不能按喇叭
$bengbeng->setHornBehavior(new notHorn());
$bengbeng->setFlyBehavior(new canFly());
$bengbeng->clickHorn();
$bengbeng->goFly();
?>