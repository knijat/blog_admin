<?php


class admincontroller
{
    public function __construct()
    {
        if(!isset($_SESSION['user']) && empty($_SESSION['user']))
        {
            $this->redirectni(array('admin','checker','default'));
            die();
        }
        if(isset($_SESSION['user']) && $_SESSION['user']['id_writer']!=1)
        {
             $this->redirectni(array('admin','writer','login'));
             die();
        }
    }

    //after check user is exist then redirct below method then will be login to admin panel
    public function loginni()
    {
                $data['page']=array('admin','admin');

                return $data;

    }
//check user if thre is or not
    public function check_user()
    {
        if(isset($_SESSION['user']) && !empty($_SESSION['user']))
        {
            $this->redirectni(array('admin','checker','login'));
        }
    }

    //get newest article
    public function newestni($url)
    {

        if(isset($url['get'][2]) && $url['get'][2]=='publish')
        {
            if(isset($url['get'][3]) && is_numeric($url['get'][3]) && isset($url['get'][4]) && is_numeric($url['get'][4]))
            {
                $get=$this->updateni($url);
            }else
                {
                    $this->redirectni(array('admin','admin',$url['get'][1]));
                }
        }else if(isset($url['get'][2]) && $url['get'][2]=='delete_a')
        {
            $get=$this->delete($url);

        }else
            {
                $get=$this->get($url);
            }
        return $get;
    }

    public function get_writersni($url)
    {
        if(isset($url['get'][2]) && $url['get'][2]=='block'){
            if (isset($url['get'][3]) && is_numeric($url['get'][3])){
            $get = $this->updateni($url);
        }else
            {
                $this->redirectni(array('admin','admin',$url['get'][1]));
            }
        }
        else if(isset($url['get'][2]) && $url['get'][2]=='delete_w')
            {
                if (isset($url['get'][3]) && is_numeric($url['get'][3])) {
                    $get = $this->delete($url);
                }else
                    {
                       $this->redirectni(array('admin','admin',$url['get'][1]));
                    }
            } else {
                  $get=$this->get($url);
                      }

        return $get;
    }

    public function get_articlesni($url)
    {
        if(isset($url['get'][2]) && $url['get'][2]=='publish')
        {
            if(isset($url['get'][3]) && is_numeric($url['get'][3]) && isset($url['get'][4]) && is_numeric($url['get'][4]))
            {
                $get=$this->updateni($url);
            }
        }else if(isset($url['get'][2]) && $url['get'][2]=='delete_a')
        {
                $get=$this->delete($url);
        }else
            {
                $get=$this->get($url);
            }
        return $get;
    }

    //all redirect from here
    public function redirectni($url,$success=null)
    {
        header('location:'.root_dir.'?'.$url[0].'='.$url[1].'/'.$url[2].$success);
    }
//get all articles,writers
    public function get($url)
    {
        $all=new get_data();

        $id_article=null;
        if(isset($url['get']['2']) && is_numeric($url['get'][2]))
        {
            $id_article='WHERE id_article='.$url['get'][2];
            $data['page']=array('admin','get_article');
        } else
            {
                $data['page']=array('admin',$url['get'][1]);
            }
        $all_got=$all->get($all->queries($url['get'][1],$id_article));

        if(isset($url['get'][2]) && !empty($url['get'][2]) && ($url['get'][2]=='true' || $url['get'][2]=='false'))
        {
            $data['result']=$url['get']['2'];
        }
        $data['data']=$all_got;

        return $data;
    }

    public function delete($url)
    {
        $got=new get_data();
        $delete_data=array($url['get'][3]);
        $all_got=$got->delete($got->queries($url['get'][2]),$delete_data);

        if($all_got==true)
        {
            $result='/true';
        }else{$result='/false';};

        $this->redirectni(array('admin','admin',$url['get'][1]),$result);
        die;
    }


    public function mainni($url)
    {
        $data['page']=array('admin','main');

        return $data;
    }

    public function updateni($url)
    {

//        if($url['get'][2]==0 || $url['get'][2]==1)
//        {
//            $published=$url['get'][2];
//            $update_data=array($published,$url['get'][3]);
//        }else
//            {
//                $this->redirectni(array('admin','admin','get_articles'));
//                die;
//            }
        $update_data=array($url['get'][3],$url['get'][4]);


    $got=new get_data();
        $all_got=$got->update($got->queries($url['get'][2]),$update_data);
         $data['page']=array('admin',$url['get'][1]);
        if($all_got==true)
        {
            $data['result']='/true';

        }else
            {
                $data['result']='/false';
            }

        $this->redirectni(array('admin','admin',$url["get"][1]),$data['result']);

    }


    public function update($user_id)
    {
        $all=new get_data();
       return $all->update($user_id);
    }
}