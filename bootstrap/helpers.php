<?php
/**
 * Created by zhangrui at 2018/10/4 12:29
 * Copyright pinfankeji.com
 */

/**
 * 获取根据路由名称生成的CSS类名
 * @return string
 */
function route_class(){
    return str_replace('.', '-', Route::currentRouteName());
}

/**
 * 获取 Gravatar 头像
 * @param        $email
 * @param int    $s
 * @param string $d
 * @param string $r
 * @param bool   $img
 * @param array  $atts
 *
 * @return string
 */
function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

/**
 * 根据给定文本生成指定长度的摘录
 * @param     $value
 * @param int $length
 *
 * @return string
 */
function make_excerpt($value, $length=100){
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return str_limit($excerpt, $length);
}
