<?php
/*
*用户关联模型
 */
namespace Admin\Model;
use Think\Model\RelationModel;
class UserModel extends RelationModel{
    protected $_link = array(
        'role'=>array(
            'mapping_type'      => self::MANY_TO_MANY,
    		'foreign_key'       =>  'user_id',
    		'relation_foreign_key'  =>  'role_id',
    		'relation_table'    =>  'x_role_user'
            ),
        );
}