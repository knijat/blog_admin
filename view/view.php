<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/23/2019
 * Time: 6:22 PM
 */

class boview
{
    public  $back_tpl;
    public function __construct()
    {
    }

    public function checking($url)
    {


        if($url['backoffice']=='true' && $url['articles']=='true' && isset($_SESSION['writer']))
        {
            $this->back_tpl = 'view\writer_articles.php';
        }
        else if($url['backoffice'] =='true' && isset($_SESSION['user'])) {
            $this->back_tpl = 'view\admin.php';

        } else if($url['backoffice']=='true' && isset($_SESSION['writer']))
        {
            $this->back_tpl='view\admin2.php';

        }else{
                $this->back_tpl='view/panel.php';

        }
        return $this->back_tpl;

    }

}