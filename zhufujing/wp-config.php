<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'zhufujing');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'zj1260911065');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '^D-_<IM0`u&5PxNr7yL3]1*!N-=utGaX|T_RJ-tL5pZ(u#*llir8!nCh^1lYGP^m');
define('SECURE_AUTH_KEY',  '^Q?}i#<Yw^I=v>M},SF0Y#7oXIo8O29>sZLZ*;i2q,Pa0bpZR8@_LCUw+AV~0~!)');
define('LOGGED_IN_KEY',    '=7Q;<sj-~$O%tLfsRCs:[3>C #8{7~q^E}qH<IE$#.=c!U~Np^9+Mr,XTQ;rT}S}');
define('NONCE_KEY',        'i[4-]j+<hm!Y<fC.q]B9i CE+7D^5)f!}&}Q~*^nY(67OENc7Cp1*B%UqG42VXWz');
define('AUTH_SALT',        'EX0,@|,KZ<.TJc2j-Yv$$6(Z^V{]i<^Nm/9cp5pBS^[Dpc$St5m:q(roTwS+a+PZ');
define('SECURE_AUTH_SALT', 'hxLY(A9?cO)j@IJ3;V$&Y/ALo4@h|C,49VEv(;q>cCleco~3;W^ue`E>l/n<8wON');
define('LOGGED_IN_SALT',   ',hY,%!y(;m6aovVHiv|zJ-J[mMi|3mpNMo57e??Z](XHvacah5H]+WCzIOEWP(y*');
define('NONCE_SALT',       'rU;!&wCzskNoP@PVrWg!?QCt ^D->L~dis~pEU{.v$Qg&QgfmVO7$BdMDBNw6Au?');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');

