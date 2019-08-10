<?php
/*

Plugin Name: 有赏 You Shang

Plugin URI: https://www.rifuyiri.net/t/4667

Description: 有赏「You Shang」是一款能为WordPress便捷加入微信、支付宝打赏/赞赏功能的插件。

Version: 1.0.1

Author: Fens Liu

Author URI: https://www.rifuyiri.net

*/

define('YOUSHANG_VERSION', '1.0.1');
define('YOUSHANG_URL', plugins_url('', __FILE__));
define('YOUSHANG_PATH', dirname( __FILE__ ));

new youshang();

class youshang{
    public function __construct(){
        if(!is_admin()){
            wp_enqueue_script('jquery');
            wp_enqueue_style('youshang_css', YOUSHANG_URL . '/static/youshang.css', array(), YOUSHANG_VERSION, 'screen');
            wp_enqueue_script('youshang_js', YOUSHANG_URL . '/static/youshang.js', array(), YOUSHANG_VERSION, true);
        }
        add_action('admin_menu', array($this, 'admin_menu'));
        add_action('the_content', array($this, 'the_content'), 99, 1);
    }

    public function the_content($content){
        $optionJson = get_option('you_shang_option');
        if(empty($optionJson)){
            return $content;
        }
        $option = json_decode($optionJson, true);
        $list = array(
            'wechat' => array(
                'status' => $option['wechat_status'],
                'thanks' => $option['wechat_thanks'],
                'qrcode' => $option['wechat_qrcode'],
                'bgcolor' => '#05af4e',
            ),
            'alipay' => array(
                'status' => $option['alipay_status'],
                'thanks' => $option['alipay_thanks'],
                'qrcode' => $option['alipay_qrcode'],
                'bgcolor' => '#00a2ea',
            ),
            'hongbao' => array(
                'status' => $option['hongbao_status'],
                'thanks' => '<p>' . $option['hongbao_thanks'] . '</p>' . '<p style=\'margin-top: 24px;\'>（余额宝支付时可抵现）</p>',
                'qrcode' => $option['hongbao_qrcode'],
                'bgcolor' => '#dd5746',
            ),
        );
        
        $popupClass = $head = $qrcode = $platform = '';
        
        $i = 0;
        foreach($list as $key => $val){
            if($val['status'] != 1){
                continue;
            }
            $style = $class = '';
            if($i > 0){
                $style = 'style="display:none;"';
            }else{
                $class = 'active';
                $popupClass = $key;
                $head = $val['thanks'];
            }
            $qrcode .= '<div class="qrcode-li ' . $key . '" ' . $style . '><img src="' . $val['qrcode'] . '" /></div>';
            $platform .= '<li class="icon-' . $key . ' ' . $class . '" data-bg-color="' . $val['bgcolor'] . '" data-thanks="' . $val['thanks'] . '"></li>';
            $i++;
        }
        
        $html = '<div class="__youshang">
            <div id="__youshang_popup" class="' . $popupClass . ' popup" style="display: none;">
                <div class="head">' . $head . '</div>
                <div class="qrcode">' . $qrcode . '</div>
                <ul class="platform">' . $platform . '</ul>
            </div>
            <a href="javascript:void(0);" id="__youshang_btn">赏</a>
        </div>';
        
        return $content . $html;
    }
    
    public function admin_menu(){
        add_plugins_page('有赏设置', '有赏设置', 'manage_options', 'youshang_settings', array($this, 'admin_settings'));
    }
    
    public function admin_settings(){
        require_once 'you-shang-admin.php';
        new youshang_admin();
    }
}