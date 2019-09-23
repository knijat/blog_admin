<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/15/2019
 * Time: 6:26 PM
 */



class controller{

    public $nicat;
    public function __construct()
    {
        if(!empty($_GET) && isset($_GET))
        {
            $url['get']=isset($_GET['admin']) ? explode('/',$_GET['admin']):explode('/',$_GET['blog']);
        }else{
            $url['get']=array('blog','default');
        }


       if($_SERVER['REQUEST_METHOD']=='POST'){
            $url['post']=$_POST;}


            $this->nicat=$url;


        }
//app run from here
        public function run($url)
        {


            $cont=$url['get'][0].'controller';
            $ni=$url['get'][1].'ni';

//check the files exist or not


            if(file_exists(cont_dir.'/admin/'.$cont.'.php')){

                require cont_dir.'/admin/'.$cont.'.php';
//check the class exist or not
               if(class_exists($cont))
               {

                    $get_class = new $cont();


//check the method exist or not

                   if(method_exists($get_class,$ni))
                   {

                       $data=$get_class->$ni($url);

// TODO burda yaxsi yoxlamayaiq;

                       if(isset($data) && !empty($data)) {

                           ob_start();

                           require(view_dir . '/' . $data['page'][0] . '/' . $data['page'][1] . '.php');

                           echo ob_get_clean();
                       }

                   }else{$this->redirect();}

               }else{$this->redirect();}


            }else{$this->redirect();}
        }

        public function redirect()
        {

            header('location:http://localhost/blog_admin_git/?admin=checker/default');
        }
}

$n=new controller();
$m=$n->run($n->nicat);

