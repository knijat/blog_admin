<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/16/2019
 * Time: 9:02 AM
 */
class blogcontroller
{
public function __construct()
{
}
public function defaultni($url)
{
        $get_data=new get_data();
        $data['page']=$url['get'];
            $data['data']=$get_data->get_all_articles();
    return $data;

}
}