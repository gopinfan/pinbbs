<?php
/**
 * Created by zhangrui at 2018/10/4 12:29
 * Copyright pinfankeji.com
 */

function route_class(){
    return str_replace('.', '-', Route::currentRouteName());
}