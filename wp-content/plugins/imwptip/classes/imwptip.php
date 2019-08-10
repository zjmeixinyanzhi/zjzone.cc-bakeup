<?php
/**
 * admin options
 */
class IMWPTip extends IMWPbase
{

	/**
	 * theme admin
	 * @var object
	 */
	protected $tipAdmin;

	protected $options;

	public function __construct()
	{
		add_action('admin_menu', array(&$this,'addMenu'));
		add_action('the_content', array(&$this, 'addTipsToContent'), 99, 1);
		wp_enqueue_style('imwptip', plugin_dir_url(dirname(__FILE__)) .'/assets/imwptip.min.css');
	}


	/**
	 * add menus
	 */
	public function addMenu()
	{
		$tipAdmin = $this->loadTipAdmin();
		$this->options = $tipAdmin->getOption();
		add_menu_page('imwptip设置', 'imwptip设置', 'manage_options', 'imwptip', array(&$this,'imwptip'));
		if ($this->options['allow_user_qrcode'] == 1) {
			if($role = $this->options['allow_userrole']) {
				$cap = get_role($role);
				$cap = array_pop(array_keys($cap->capabilities));
				add_menu_page('打赏设置', '打赏设置', $cap, 'usertip', array(&$this,'usertip'));
			}
		}
	}

	/**
	 * imwptip options
	 * @return
	 */
	public function imwptip()
	{
		if (isset($_POST['allow_user_qrcode'])) {
			$tipAdmin = $this->loadTipAdmin();
			$tipAdmin->saveOptions();
			$this->options = $tipAdmin->getOption();
		}
		$roles = array_keys(get_editable_roles());
		$roles = array_combine($roles, $roles);
		$formData = array(
			array(
				'label' => '默认支付宝赞赏二维码',
				'name' => 'alipay_qrcode',
				'type' => 'image',
				'value' => $this->options['alipay_qrcode'],
				'desc' => '上传支付宝支付二维码',
				),
			array(
				'label' => '默认微信赞赏二维码',
				'name' => 'wxpay_qrcode',
				'type' => 'image',
				'value' => $this->options['wxpay_qrcode'],
				'desc' => '上传微信支付二维码',
				),
			array(
				'label' => '允许用户设定二维码',
				'name' => 'allow_user_qrcode',
				'type' => 'select',
				'options' => array(
					0 => '不允许',
					1 => '允许',
				),
				'value' => $this->options['allow_user_qrcode'],
				'desc' => '允许用户在自己的控制面板中设定二维码',
				),
			array(
				'label' => '允许角色',
				'name' => 'allow_userrole',
				'type' => 'select',
				'options' => $roles,
				'value' => $this->options['allow_userrole'],
				'desc' => '允许权限高于选择的角色设定二维码',
				),

			array(
				'label' => '保存',
				'name' => 'submit',
				'type' => 'submit',
				)
			);
		$tpldata['form'] = $this->getTableForm($formData);
		$this->display('imwptip.php', $tpldata);
	}
	
	/**
	 * user tips page
	 * @return
	 */
	public function usertip()
	{
		$tipAdmin = $this->loadTipAdmin();		
		if (isset($_POST['allow_user_qrcode'])) {
			$tipAdmin->saveUserOption();
		}
		$options = $tipAdmin->getUserOption();

		$formData = array(
			array(
				'label' => '支付宝打赏二维码',
				'name' => 'alipay_qrcode',
				'type' => 'image',
				'value' => $options['alipay_qrcode'],
				'desc' => '上传支付宝支付二维码',
				),
			array(
				'label' => '微信打赏二维码',
				'name' => 'wxpay_qrcode',
				'type' => 'image',
				'value' => $options['wxpay_qrcode'],
				'desc' => '上传微信支付二维码',
				),
			array(
				'label' => '允许用户设定二维码',
				'name' => 'allow_user_qrcode',
				'type' => 'hidden',
				'value' => 1,
				),
			array(
				'label' => '保存',
				'name' => 'submit',
				'type' => 'submit',
				)
			);
		$tpldata['form'] = $this->getTableForm($formData);
		$this->display('imwptip.php', $tpldata);
	}

	/**
	 * add tips to post content
	 */
	public function addTipsToContent($content)
	{
		if (!is_singular()) {
			return $content;
		}
		$options = get_option('imwptip');
		if ($options['allow_user_qrcode'] == 1) {
			global $authordata;
			$meta = json_decode(get_user_meta($authordata->ID, 'imwptip', true), true);
			if (isset($meta['alipay_qrcode'])) {
				$options['alipay_qrcode'] = $meta['alipay_qrcode'];
			}
			if (isset($meta['wxpay_qrcode'])) {
				$options['wxpay_qrcode'] = $meta['wxpay_qrcode'];
			}
		}
		$tipsContent .= "<p id=\"imwp_tip_content\"><span class=\"imwp_img\"><img src=\"{$options['wxpay_qrcode']}\" />微信赞赏</span><span class=\"imwp_img\"><img src=\"{$options['alipay_qrcode']}\" />支付宝赞赏</span></p>";		
		$tips = '<span id="imwp_tip">赞赏'.$tipsContent.'<span id="dot_bottom"></span><span id="dot_bottom_top"></span></span>';
		
		return $content . $tips;
	}

	/**
	 * views
	 * @param  string $template
	 * @param  array  $tpldata 
	 */
	protected function display($template, $tpldata = array())
	{
		require dirname(dirname(__FILE__)) . '/pages/' . $template;
	}


	/**
	 * load tips
	 * @return object
	 */
	protected function loadTipAdmin()
	{
		if (isset($this->tipAdmin)) {
			return $this->tipAdmin;
		}
		require dirname(__FILE__) . '/imwptipadmin.php';
		return $this->tipAdmin = new IMWPTipAdmin;
	}
}

new IMWPTip;