<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/15/2019
 * Time: 6:26 PM
 */



class controller implements ControllerCo {

    public $nicat;


    public function __construct()
    {
        $this->checkUrl($_SERVER['QUERY_STRING']);
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
            header('location:'.root_dir.'?admin=checker/default');
        }

        public function checkUrl($url_data)
        {
            //Get all url from here and modify it as want.


            $entered_url=explode('=',$url_data);
            $a=$entered_url[0];
            $data=explode('/',$entered_url[1]);

            array_unshift($data,$a);

            $valid_data=$this->validation($data);




//            if(!empty($_GET) && isset($_GET))
//            {
//                $url['get']=isset($_GET['admin']) ? explode('/',$_GET['admin']):explode('/',$_GET['blog']);
//            }else{
//                $url['get']=array('checker','default');
//            }
//
//            if($_SERVER['REQUEST_METHOD']=='POST'){
//                $url['post']=$_POST;}
//            $this->nicat=$url;
        }


        public function validation($url)
        {

            foreach ($url as $key => $url_d){


                    $data= preg_replace('/[^a-zA-Z0-9_ -]/s','',$url_d);
                    $data = trim($data);
                     $data = stripslashes($data);
                    $data = htmlspecialchars($data);

                    if($key==0){
                        $data=$data.'controller';
                    }else if($key=1){
                        $data=$data.'ni';
                    }

                    $url[$key]=$data;
                }

            return $url;
        }



}

$n=new controller();


