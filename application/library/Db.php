<?php
/**
 * Created by PhpStorm.
 * User: mibine
 * Date: 2018/11/2
 * Time: 14:37
 */

class Db{
    protected $db;
    protected $host;
    protected $dbName;
    protected $user;
    protected $password;
    protected $dsn;
    protected $conn;
    public function __construct(){
        $dbParams = Yaf_Registry::get("config")->database;
        $this->db = $dbParams->db;
        $this->host = $dbParams->host;
        $this->dbName = $dbParams->dbName;
        $this->user = $dbParams->user;
        $this->password = $dbParams->password;
        $this->dsn = "$this->db:host=$this->host;dbname=$this->dbName";
        try {
            $this->conn = new PDO($this->dsn, $this->user, $this->password); //初始化一个PDO对象
        } catch (PDOException $e) {
            die ("Error,connection!: " . $e->getMessage() . "<br/>");
        }
    }
//$res = $db->query("select * from employee");
//$res = $db->insert('insert into employee values(6,"max1","12323",0)');
//$res = $db->delete('delete from employee where Name="max1"');
//$res = $db->insert('update employee set Salary=112333 where Name="Max"');
//    /**
//     * Db constructor.
//     * @param $db 数据库类型
//     * @param $host 数据库主机名
//     * @param $dbName 使用的数据库
//     * @param $user 数据库连接用户名
//     * @param $password 对应的密码
//     */
//    public function __construct($db,$host,$dbName,$user,$password){
//        $config = new Yaf_Config_Ini('D:\xampp\htdocs\yafsample\conf\application.ini');
//        var_dump($config);
//        $this->db = $db;
//        $this->host = $host;
//        $this->dbName = $dbName;
//        $this->user = $user;
//        $this->password = $password;
//        $this->dsn = "$db:host=$host;dbname=$dbName";
//        try {
//            $this->conn = new PDO($this->dsn, $this->user, $this->password); //初始化一个PDO对象
//        } catch (PDOException $e) {
//            die ("Error,connection!: " . $e->getMessage() . "<br/>");
//        }
//    }

    /**
     * @description 增加功能
     * @param $sql sql语句
     * @return array 返回影响条数
     */
    public function insert($sql){
        return $this->conn->exec($sql);
    }
    /**
     * @description 删除功能
     * @param $sql sql语句
     * @return array 返回影响条数
     */
    public function delete($sql){
        return $this->conn->exec($sql);
    }
    /**
     * @description 修改功能
     * @param $sql 查询语句
     * @return array 返回结果集数组
     */
    public function update($sql){
        return $this->conn->exec($sql);
    }
    /**
     * @description 查询功能
     * @param $sql 查询语句
     * @return array 返回结果集数组
     */
    public function query($sql){
       $result = [];
        foreach ($this->conn->query($sql) as $row) {
            $result[] = $row;
        }
        return $result;
    }
}