<?php

/**

*================================================================

*framework/database/Mysql.class.php

*Database operation class

*================================================================

*/

class Mysql{

    protected $conn = false;  //DB connection resources

    protected $sql;           //sql statement

   

    /**

     * Constructor, to connect to database, select database and set charset

     * @param $config string configuration array

     */

    public function __construct($config = array()){

        $host = isset($config['host'])? $config['host'] : 'localhost';

        $user = isset($config['user'])? $config['user'] : 'root';

        $password = isset($config['password'])? $config['password'] : 'secret143';

        $dbname = isset($config['dbname'])? $config['dbname'] : '';

        $port = isset($config['port'])? $config['port'] : '3306';

        $charset = isset($config['charset'])? $config['charset'] : '3306';

       
        try{
            $this->conn = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "<center><b>Connection error: " . $exception->getMessage() . "</b></center>";
        }
        //$this->conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    }

    /**

     * Set charset

     * @access private

     * @param $charset string charset

     */

    private function setChar($charest){

        $sql = 'set names '.$charest;

        $this->query($sql);

    }

    /**

     * Execute SQL statement

     * @access public

     * @param $sql string SQL query statement

     * @return $result，if succeed, return resrouces; if fail return error message and exit

     */

    public function query($sql){        

        $this->sql = $sql;

        // Write SQL statement into log

        $str = $sql . "  [". date("Y-m-d H:i:s") ."]" . PHP_EOL;

        file_put_contents("log.txt", $str,FILE_APPEND);



        $statement = $this->conn->prepare("SELECT * FROM blog_posts WHERE category_id = ?");
        $statement->execute([ $category_id] );
         
        // get all:
        $result = $statement->fetchAll();
        
        return $result;

    }

    /**

     * Get the first column of the first record

     * @access public

     * @param $sql string SQL query statement

     * @return return the value of this column

     */

    public function getOne($sql){

        $statement = $this->conn->prepare($sql);
        $statement->execute();
         
        //get one row:
        $row = $statement->fetch();

        if ($row) {

            return $row[0];

        } else {

            return false;

        }

    }

    /**

     * Get one record

     * @access public

     * @param $sql SQL query statement

     * @return array associative array

     */

    public function getRow($sql){

       $statement = $this->conn->prepare($sql);
        $statement->execute();
         
        //get one row:
        $row = $statement->fetch();

        if ($row) {

            return $row[0];

        } else {

            return false;

        }

    }

    /**

     * Get all records

     * @access public

     * @param $sql SQL query statement

     * @return $list an 2D array containing all result records

     */

    public function getAll($sql){

       
        $statement = $this->conn->prepare($sql);
        $statement->execute();
         

        while ($row = $statement->fetchAll()){

            $list[] = $row;

        }

        return $list;

    }

    /**

     * Get the value of a column

     * @access public

     * @param $sql string SQL query statement

     * @return $list array an array of the value of this column

     */

    public function getCol($sql){


        $list = array();

        return $list;

    }


   

    /**

     * Get last insert id

     */

    public function getInsertId(){

        return true;

    }

    /**

     * Get error number

     * @access private

     * @return error number

     */

    public function errno(){

        return "errno";

    }

    /**

     * Get error message

     * @access private

     * @return error message

     */

    public function error(){

        return "error";

    }

}
