<?php
/**
 * @name SampleModel
 * @desc sample数据获取类, 可以访问数据库，文件，其它系统等
 * @author 20180301-100410\administrator
 */
class SampleModel {
    protected $db;
    public function __construct() {
        if(!$this->db){
            $this->db = new Db();
        }
    }   
    
    public function selectSample() {

//        return 'Hello World!';
    }

    public function insertSample($arrInfo) {
        return true;
    }
    public function selectEmployee(){
        return $this->db->query("select * from employee");
    }
}
