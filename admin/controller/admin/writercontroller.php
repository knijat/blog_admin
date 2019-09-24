<?php

class writercontroller
{
    public function __construct()
    {
        //cehcek the session if there is
        if(!isset($_SESSION['user']) && empty($_SESSION['user']))
    {
        $this->redirectni(array('admin','checker','default'));
        die();
    }
        //check url if exist a user but url is different then redirect right path
        if(isset($_SESSION['user']) && $_SESSION['user']['id_writer']==1)
        {
            $this->redirectni(array('admin','admin','login'));
            die();
        }
    }

    //after check user is exist then redirct below method then will be login to admin panel
    public function profileni($url)
    {

        $inf_data['id_writer']=$_SESSION['user']['id_writer'];

        if(isset($url['get'][1]) && $url['get'][2]!='update_w' && $url['get'][1]=='profile' || ($url['get'][2]=='true' || $url['get'][2]=='false'))
        {


        $all=new get_data();
        $all_got=$all->get($all->queries($url['get'][1],$inf_data));

        if($all_got)
        {
            $data['page']=array('writer','profile');
            $data['data']=$all_got;

        }
        }else if(isset($url['get'][1]) && $url['get'][1]=='profile' && (isset($url['get'][2]) && $url['get'][2]=='update_w'))
        {


            $all_got=$this->updateni($url);

        }

        if($all_got=='false')
        {
            $this->redirectni(array('admin','writer','get_my_articles'));
        }

        if(isset($url['get'][2]) && !empty($url['get'][2]) && ($url['get'][2]=='true' || $url['get'][2]=='false'))
        {
            $data['result']=$url['get']['2'];
        }

        return $data;
    }

    public function settingni($url)
    {
        $data['page']=array('writer','setting');
        return $data;
    }

//check user if thre is or not
    public function check_user()
    {
        if(isset($_SESSION['user']) && !empty($_SESSION['user']))
        {
            $user=$_SESSION['user']['id_writer']==1 ? 'admin' : 'writer';

            $this->redirectni(array('admin',$user,'login'));
        }
    }
    //all redirect from here
    public function redirectni($url,$success=null)
    {
        header('location:http://localhost/blog_admin_git/admin/?'.$url[0].'='.$url[1].'/'.$url[2].$success);
    }
//get all articles,writers
    public function get_my_articlesni($url)
    {

        $inf_data['id_writer']=$_SESSION['user']['id_writer'];
        $inf_data['id_article']='';
        $data['data']=array();
        $data['page']=array();
        if(isset($url['get'][1]) && $url['get'][1]=='get_my_articles' && (is_numeric($url['get'][2])&& isset($url['get'][2])))
        {
            $inf_data['id_article']=' AND id_article='.$url['get'][2];
            $data['page']=array('writer','get_my_article');

        }else if(isset($url['get'][1]) && $url['get'][1]=='get_my_articles')
        {

                $data['page']=array('writer','get_my_articles');
        }

        if($data_all=$this->get($url['get'][1],$inf_data))
        {
         $data['data']=$data_all;
        };


        return $data;
    }

    public function get($url,$data)
    {
        $all=new get_data();


        $get=$all->get($all->queries($url,$data));


        if($get!=null)
        {
            return $get;
        }else if($get=='false')
        {
            die('there is some problem about get the data');
        }else{
            return false;
        }



    }

    public function deleteni($url)
    {

        if(isset($url['get'][2]) && is_numeric($url['get'][2]))
        {
            $id_article=array($url['get'][2]);
        $got=new get_data();
        $all_got=$got->delete($got->queries('delete_a'),$id_article);

        if($all_got==true)
        {
            $result='/true';
        }else{$result='/false';};

        $this->redirectni(array('admin','writer','get_my_articles'),$result);
    }else
        {
            $this->redirectni(array('admin','writer','get_my_articles'));
            die;
        }
    }

    public function new_articleni($url)
    {

        if(isset($url['get'][1]) && $url['get'][1]=='new_article')
        {
            $data['page']=array('writer','new_article');
        }

        return $data;
    }

    public function editni($url)
{
   $all=new get_data();
   $all_got=$all->get($all->queries($url['get'][1],$url['get']['2']));
   $data['data']=$all_got;
   $data['page']=array('writer','edit');

   return $data;
}

    public function sendni($url)
    {

        if(empty($url['post']))
        {
            $this->redirectni(array('admin','writer','new_article'));
            die();
        }
        $all=new get_data();
        $all_got=$all->insert($all->queries($url['get'][1],$_SESSION['user']['id_writer']),$url['post'],$_SESSION['user']['id_writer']);
        $data['page']=array('writer','new_article');
        $data['result']=$all_got ? 'true':'false';
        $this->redirectni(array('admin','writer','new_article'),'/true');
    }

    public function updateni($url)
    {

        if(empty($url['post']))
    {
        $this->redirectni(array('admin','writer','new_article'));
        die();
    }

        foreach($url['post'] as $aa)
        {
            $qq[]=$aa;
        }

        $all=new get_data();
        $all_got=$all->update($all->queries($url['get']['2']),$qq);
         $data['result']=$all_got ? '/true':'/false';
         if(isset($url['get'][1]) && $url['get'][1]=='profile')
         {
             $check_redirect_url='profile';
         }else if(isset($url['get'][1]) && $url['get'][1]=='get_my_articles')
         {
             $check_redirect_url='get_my_articles';
         }

         $this->redirectni(array('admin','writer',$check_redirect_url),$data['result']);

    }

//unset the session log out


}