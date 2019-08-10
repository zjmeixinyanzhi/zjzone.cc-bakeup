<?php
class youshang_admin{
    public function __construct(){
        if(!current_user_can('administrator')) {
            exit('<p>Permission denied.</p>');
        }
        if($_POST['youshang_submit'] == '保存'){
            check_admin_referer('youshang_setting', 'youshang_nonce');
            $param = array(
                'wechat_status', 'wechat_thanks', 'wechat_qrcode', 
                'alipay_status', 'alipay_thanks', 'alipay_qrcode', 
                'hongbao_status', 'hongbao_thanks', 'hongbao_qrcode');
            $option = json_decode(get_option('you_shang_option'), true);
            foreach($_POST as $key => $val){
                if(in_array($key, $param)){
                    $option[$key] = sanitize_text_field($val);
                }
            }
            $json = json_encode($option);
            update_option('you_shang_option', $json);
        }
        $option = get_option('you_shang_option');
        if(!empty($option)){
            $option = json_decode($option, true);
        }
        if(empty($option['wechat_thanks'])){
            $option['wechat_thanks'] = '~谢谢打赏~';
        }
        if(empty($option['alipay_thanks'])){
            $option['alipay_thanks'] = '~谢谢打赏~';
        }
        if(empty($option['hongbao_thanks'])){
            $option['hongbao_thanks'] = '~谢谢打赏~';
        }
        if(empty($option['wechat_qrcode'])){
            $option['wechat_qrcode'] = YOUSHANG_URL . '/image/wechat.png';
        }
        if(empty($option['alipay_qrcode'])){
            $option['alipay_qrcode'] = YOUSHANG_URL . '/image/alipay.png';
        }
        if(empty($option['hongbao_qrcode'])){
            $option['hongbao_qrcode'] = YOUSHANG_URL . '/image/hongbao.png';
        }

        echo '<h2>有赏「You Shang」设置</h2>';
        echo '<form action="" method="post">';
        wp_nonce_field('youshang_setting', 'youshang_nonce');
        echo '<table class="form-table">';
        echo '<tr valign="top">
                <th scope="row">微信「WeChat」</th>
                <td>
                    <fieldset>
                        <p>
                            <label title="开启">
                                <input type="radio" name="wechat_status" value="1" ' . ($option['wechat_status'] == 1 ? 'checked="checked"' : '') . '/>
                                <span>开启</span>
                            </label>
                        </p>
                        <p>
                            <label title="关闭">
                                <input type="radio" name="wechat_status" value="0" ' . ($option['wechat_status'] != 1 ? 'checked="checked"' : '') . '/>
                                <span>关闭（默认）</span>
                            </label>
                        </p>
                        <ul>
                            <li>
                                <label>感谢语/引导语：</label>
                                <input type="text" class="regular-text code" name="wechat_thanks" value="' . $option['wechat_thanks'] . '" />
                                <br />
                                <p class="description">如：谢谢打赏</p>
                            </li>
                            <li>
                                打赏码/收款码：
                                <label><input type="text" class="regular-text code" name="wechat_qrcode" value="' . $option['wechat_qrcode'] . '" /></label>
                                <br />
                                <p class="description">完整的二维码图片地址</p>
                            </li>
                        </ul>
                    </fieldset>
                </td>
            </tr>';
        echo '<tr valign="top">
                <th scope="row">支付宝「Alipay」</th>
                <td>
                    <fieldset>
                        <p>
                            <label title="开启">
                                <input type="radio" name="alipay_status" value="1" ' . ($option['alipay_status'] == 1 ? 'checked="checked"' : '') . '/>
                                <span>开启</span>
                            </label>
                        </p>
                        <p>
                            <label title="关闭">
                                <input type="radio" name="alipay_status" value="0" ' . ($option['alipay_status'] != 1 ? 'checked="checked"' : '') . '/>
                                <span>关闭（默认）</span>
                            </label>
                        </p>
                        <ul>
                            <li>
                                <label>感谢语/引导语：</label>
                                <input type="text" class="regular-text code" name="alipay_thanks" value="' . $option['alipay_thanks'] . '" />
                                <br />
                                <p class="description">如：谢谢打赏</p>
                            </li>
                            <li>
                                打赏码/收款码：
                                <label><input type="text" class="regular-text code" name="alipay_qrcode" value="' . $option['alipay_qrcode'] . '" /></label>
                                <br />
                                <p class="description">完整的二维码图片地址</p>
                            </li>
                        </ul>
                    </fieldset>
                </td>
            </tr>';
        echo '<tr valign="top">
                <th scope="row">红包码「Hong Bao」</th>
                <td>
                    <fieldset>
                        <p>
                            <label title="开启">
                                <input type="radio" name="hongbao_status" value="1" ' . ($option['hongbao_status'] == 1 ? 'checked="checked"' : '') . '/>
                                <span>开启</span>
                            </label>
                        </p>
                        <p>
                            <label title="关闭">
                                <input type="radio" name="hongbao_status" value="0" ' . ($option['hongbao_status'] != 1 ? 'checked="checked"' : '') . '/>
                                <span>关闭（默认）</span>
                            </label>
                        </p>
                        <ul>
                            <li>
                                <label>感谢语/引导语：</label>
                                <input type="text" class="regular-text code" name="hongbao_thanks" value="' . $option['hongbao_thanks'] . '" />
                                <br />
                                <p class="description">如：谢谢打赏</p>
                            </li>
                            <li>
                                打赏码/收款码：
                                <label><input type="text" class="regular-text code" name="hongbao_qrcode" value="' . $option['hongbao_qrcode'] . '" /></label>
                                <br />
                                <p class="description">完整的二维码图片地址，推荐使用支付宝红包码</p>
                            </li>
                        </ul>
                    </fieldset>
                </td>
            </tr>';
        echo '</table>
            <p class="submit"><input type="submit" name="youshang_submit" id="submit" class="button-primary" value="保存"></p>
            </form>';
        echo '<h2>意见反馈</h2>
            <p>你的意见是「有赏」成长的动力，欢迎给我们留言，或许你想要的功能下一个版本就会实现哦！</p>
            <p>插件官方页面：<a href="https://www.rifuyiri.net/t/4667" target="_blank">https://www.rifuyiri.net/t/4667</a></p>
            <p>微信公众号：<a href="' . YOUSHANG_URL . '/image/qrcode.jpg" target="_blank">ri-fu-yi-ri</a></p>
        ';
    }
}