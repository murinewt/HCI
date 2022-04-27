<?php
//mysql logins
    $host = 'localhost';
    $dbname = 'databasemysql';
    $username = 'root';
    $password = '';



$dataB = new databaseDB($host,$username,$password,$dbname);
    

class databaseDB
{
    function __construct($host, $username, $password, $dbname)
    {
        $this->conn = new mysqli($host, $username, $password, $dbname);
    
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }else{
             //echo "Connected to $dbname at $host successfully.";
        }
    }
    //function to insert the data to the database
    public function articleSave($articleName, $articleDesc, $display){
        $result = false;
        if($stmt = $this->conn->prepare("INSERT INTO news_articles(title,description,display) VALUES (?,?,?)")){
      
        $stmt->bind_param('sss',$articleName, $articleDesc, $display);
        $articleName=$articleName;
        $articleDesc=$articleDesc;
        $display=$display;
        $result = $stmt->execute();
        if($result){
            echo "<script type='text/javascript'>alert('you've added the article!!');</script>";
        }
        //header("Refresh:0");
        $stmt->close();
        
        }else{
         var_dump($this->conn->error);
        } 
    }

    public function showAllArticles(){
         $result = array();
        $stmt = $this->conn->prepare("SELECT * FROM news_articles");
        $stmt->execute();
        $res = $stmt->get_result();
        if($res->num_rows>0){

            while ($row = $res->fetch_assoc()) {
                $result[] = $row;
            }
        }
        $this->printArticle(1);
        //echo $result." ";
        return $result;
    }

    public function printArticle($id){
        if($stmt = $this->conn->prepare("SELECT * FROM news_articles where id=?")){
            $stmt->bind_param('d',$id);
            $stmt->execute();
            $res = $stmt->get_result()->fetch_assoc();
            $row=$res;
            return $row;
        }
    }
    public function findFirstId(){

        if($stmt = $this->conn->prepare('SELECT id FROM news_articles')){
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();
        $value = $data ? $data['id'] : NULL;
        return $value;
    }

    }
}

?>