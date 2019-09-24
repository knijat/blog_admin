<?php

class checkercontroller
{
    public function __construct()
    {

    }

    public function check_loginni($url)
    {
        $this->check_user();


        $exist = new get_data();
        $data = $exist->check_data_exist($url['post']['login'], $url['post']['password']);

        if (isset($data['data']) && !empty($data['data'])) {
            if($this->update($data['data']['id_writer'])){
                $_SESSION['user'] = $data['data'];
                $user=$_SESSION['user']['id_writer']==1 ? 'admin' : 'writer';

                $this->redirectni(array('admin',$user,'login'));
            }
            else{$this->redirectni(array('admin','checker','default'));}
        }else if($data['result']=='blocked'){
            $this->redirectni(array('admin','checker','default'),$data['result']);
        }
        else{
            $this->redirectni(array('admin','checker','default'),$data['result']);
        }
    }


    public function defaultni($url)
    {

        $this->check_user();

        if(isset($url['get'][2]) && ($url['get'][2]=='false' || $url['get'][2]=='block'))
        {
            $data['result']=$url['get'][2];
        }
        $data['page']=array('admin','default');

        return $data;

    }

    public function update($user_id)
    {
        $last_seen=date("Y-m-d H:i:s",time());

        $all=new get_data();
        return $all->update($all->queries('user_update'),array($last_seen,$user_id));

    }

    public function check_user()
    {
        if(isset($_SESSION['user']) && !empty($_SESSION['user']))
        {

            $user=$_SESSION['user']['id_writer']==1 ? 'admin' : 'writer';

            $this->redirectni(array('admin',$user,'profile'));

        }
    }

    public function unsetni()
    {
        $this->update($_SESSION['user']['id_writer']);
        session_destroy();
        $this->redirectni(array('','',''));
    }

    public function redirectni($url,$result=null)
    {

        header('location:http://localhost/blog_admin_git/admin/?'.$url[0].'='.$url[1].'/'.$url[2].$result);

    }
}