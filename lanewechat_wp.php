<?php
/**
 * @package LaneWeChat
 * @version 1.5.4
 */
/*
Plugin Name: LaneWeChat

Description: 这是一个为快速开发微信应用而生的PHP框架。将微信的开发者功能根据文档进行了封装。为了快速开发的目的，开发者完全不需要要知道具体是如何实现的，只需要简单的调用方法即可

Author: lane

Plugin URI: http://lanewechat.lanecn.com/

Version: 1.5.4
Author URI: http://www.lanecn.com
*/

require_once 'wechat.php';

add_action('parse_request', 'lanewechat_check', 4);
function lanewechat_check($wp_query){
    if( isset($_GET["echostr"]) ){
        \LaneWeChat\GetLaneWeChat()->checkSignature();
        exit;
    } else if ( isset($_GET["signature"]) ) {
        $ret_msg = \LaneWeChat\GetLaneWeChat()->run();
        if( empty($ret_msg) ) {
        	return;
        }
        echo $ret_msg;
        exit;
    }
}