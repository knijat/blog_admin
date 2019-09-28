<?php

session_start();
class singleton
{
    private $oonnection;
    private static $instance;
    private $hsot='localhost';
    private $username='root';
    private $password='';
    private $database='blog_panel';

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance=new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        try{$this->connection=new PDO("mysql:host=$this->host;dbname=$this->database",$this->username,$this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


        }
        catch(PDOexception $e)
{
echo '<p style="color:red;background-color:black">Connection failes'.$e->getMessage().'</p>';
}
    }

    private function __clone(){}

    public function getConnection()
    {
        return $this->connection;
    }

}

class get_data
{

    public $tried_connect;

    public function __construct()
    {
        $try_connect=singleton::getInstance();
        $this->tried_connect=$try_connect->getConnection();
    }

    public function check_data_exist($username,$password)
    {

        try{
      $get_data=$this->tried_connect->prepare('SELECT * FROM writers WHERE name="'.$username.'" AND password="'.$password.'"');

      $get_data->execute();

      $data['data']=$get_data->fetch(PDO::FETCH_ASSOC);

      if(!empty($data['data']))
      {
          if($data['data']['block']==1)
          {
              $data['data']='';
              $data['result']='/block';
          }else
              {
                  $data['result']='/true';
              }
      }else{$data['result']='/false';}

        }
      catch(PDOException $e)
      {
        echo 'Get data is failed'.$e->getMessage();

      }

          return  $data;


    }


    public function get_articles_db($id_writer)
    {

        try{
            $get_articles=$this->tried_connect->prepare('SELECT * FROM articles WHERE id_writer='.$id_writer);
            $get_articles->execute();
            $this->got_data=$get_articles->fetch(PDO::FETCH_ASSOC);

        }
        catch (PDOException $e)
        {
            echo 'Get articles is failed'.$e->getMessage();
        }
        return '<b>'.$this->got_data['article'].'</b>';
    }


    public function update($query,$data,$user=null)
    {


        try
        {
            $get=$this->tried_connect->prepare($query);
            $get->execute($data);

        }catch (PDOException $e)
        {
            return false;
        }
        return true;
    }

    public function queries($url,$user=null)
    {
        $queries=array('get_my_articles'=>'SELECT a.* FROM articles a  WHERE id_writer='.$user['id_writer'].$user['id_article'],
                       'edit'=>'SELECT a.* FROM articles a  WHERE a.id_article='.$user,
                       'update_w'=>'UPDATE writers a SET a.name=?,a.surname=?,a.email=?,a.password=? WHERE a.id_writer=?',
                       'profile'=>'SELECT a.name,a.surname,a.email,a.id_writer,a.password  FROM writers a  WHERE a.id_writer='.$user["id_writer"],
                       'user_update'=>'UPDATE writers SET last_seen= ? WHERE id_writer=?',
                       'delete_w'=>'DELETE from writers WHERE id_writer=?',
                       'delete_a'=>'DELETE from articles WHERE id_article=?',
                       'publish'=>'UPDATE articles SET publish= ? WHERE id_article=?',
                       'block'=>'UPDATE writers SET block= ? WHERE id_writer=?',
                       'update_a'=>'UPDATE articles SET header=?,subject=?,articles=? WHERE id_article=?',
                        'get_writers'=>'SELECT a.*,s.count_article FROM `writers` a LEFT JOIN (SELECT id_writer,count(*) AS count_article FROM articles GROUP BY id_writer) s ON s.id_writer=a.id_writer WHERE a.id_writer NOT IN(1)',
                        'get_articles'=>'SELECT a.*,s.name FROM articles a LEFT JOIN writers s ON a.id_writer=s.id_writer '.$user,
                        'newest'=>'SELECT a.*,s.name FROM articles a LEFT JOIN writers s ON a.id_writer=s.id_writer WHERE publish=0',
                        'send'=>'INSERT INTO articles (header,articles,subject,id_writer,date) VALUES(?,?,?,?,?)'
                         );

        if(array_key_exists($url,$queries))
        {
            return $queries[$url];
        }else
            {
                return false;
            }

    }

    public function insert($query,$data,$id_writer=null)
    {

        $recent_date=date("Y-m-d H:i:s",time());
        try
        {$get_in=$this->tried_connect->prepare($query);
        $get_in->execute([$data['header'],$data['article'],$data['subject'],$id_writer,$recent_date]);

        }catch(PDOException $e)
        {
            return false;
        }
        return true;
    }

    public function get($query)
    {

        try{
            $get=$this->tried_connect->prepare($query);
            $get->execute();
            $last=$get->fetchAll(PDO::FETCH_ASSOC);

        }
        catch (PDOException $e)
        {
            echo 'Get all articles is failed'.$e->getMessage();
        }

        return $last;
    }

    public function delete($query,$data)
    {

        try{$get=$this->tried_connect->prepare($query);
            $get->execute($data);
        }
        catch (PDOException $e)
        {
           return false;
        }
        return true;
    }
}




