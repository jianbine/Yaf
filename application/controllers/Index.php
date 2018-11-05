<?php
/**
 * @name IndexController
 * @author mibine
 * @desc 默认控制器
 */
class IndexController extends Yaf_Controller_Abstract {

	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/sample/index/index/index/name/20180301-100410\administrator 的时候, 你就会发现不同
     */
	public function indexAction($name = "Stranger") {
		//1. fetch query
		$get = $this->getRequest()->getQuery("get", "default value");

		//2. fetch model
		$model = new SampleModel();

		//3. assign
		$this->getView()->assign("content", $model->selectSample());
		$this->getView()->assign("name", $name);
		//4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return TRUE;
	}
    /**
     * smarty引入测试
     */
    public function smartyAction(){
        //获取session
        $session = Yaf_Session::getInstance();
        $session->set("config","test");
        $session->del("config");
        echo $session->has("config");
        echo $session->get("config");
        //正确用法
        $this->getView()->assign("content","I'm a smarty !");
        $this->getView()->display("index/smarty.phtml");
        return false;
    }
	/**
     * PDO引入使用
     */
	public function addAction(){
        $db = new Db();
        $res = $db->query("select * from employee");
	    var_dump($res);
	    return false;
    }
    /**
     * employee列表
     */
    public function getEmployeeListAction(){
        $model = new SampleModel();
        var_dump($model->selectEmployee());
        return false;
    }

}
