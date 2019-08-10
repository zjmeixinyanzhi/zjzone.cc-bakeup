<?php
class IMWPTipAdmin extends IMWPBase
{
	/**
	 * save options
	 */
	public function saveOptions()
	{
		$alipayQRCode = $this->upload('alipay_qrcode');
		$wxPayQRCode = $this->upload('wxpay_qrcode');
		$allowUserQRCode = intval($_POST['allow_user_qrcode']);
		$allowUserRole = trim(addslashes(($_POST['allow_userrole'])));

		$options = $this->getOption();
		if ($options !== false) {
			if ($alipayQRCode) {
				$options['alipay_qrcode'] = $alipayQRCode;
			}
			if ($wxPayQRCode) {
				$options['wxpay_qrcode'] = $wxPayQRCode;
			}
			$options['allow_user_qrcode'] = $allowUserQRCode;
			$options['allow_userrole'] = $allowUserRole;
			return update_option('imwptip', $options);
		} else {
			$options = array(
				'alipay_qrcode' => $alipayQRCode,
				'wxpay_qrcode' => $wxPayQRCode,
				'allow_user_qrcode' => $allowUserQRCode,
				'allow_userrole' => $allowUserRole,
				);
			return add_option('imwptip', $options);
		}
	}

	public function getOption()
	{
		return get_option('imwptip');
	}

	/**
	 * save user options
	 */
	public function saveUserOption()
	{
		$user = wp_get_current_user();
		$alipayQRCode = $this->upload('alipay_qrcode');
		$wxPayQRCode = $this->upload('wxpay_qrcode');
		$allowUserQRCode = intval($_POST['allow_user_qrcode']);
		$options = $this->getUserOption($user->data->ID);
		if ($options) {
			if ($alipayQRCode) {
				$options['alipay_qrcode'] = $alipayQRCode;
			}
			if ($wxPayQRCode) {
				$options['wxpay_qrcode'] = $wxPayQRCode;
			}
			$options['allow_user_qrcode'] = $allowUserQRCode;
			return update_user_meta($user->data->ID, 'imwptip', json_encode($options));
		} else {
			$options = array(
				'alipay_qrcode' => $alipayQRCode,
				'wxpay_qrcode' => $wxPayQRCode,
				'allow_user_qrcode' => $allowUserQRCode,
				);			
			return add_user_meta($user->data->ID, 'imwptip', json_encode($options), true);
		}
	}

	/**
	 * get user option
	 * @param  int $userId
	 * @return array 
	 */
	public function getUserOption($userId = '')
	{
		if (!$userId) {
			$user = wp_get_current_user();
			$userId = $user->data->ID;
		}
		return json_decode(get_user_meta($userId, 'imwptip', true), true);
	}

}