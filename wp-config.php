<?php
/**
 * Базовая конфигурация WordPress.
 *
 * Данный файл содержит конфигурацию следующих параметров: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Вы можете почитать подробнее, зайдя на
 * страницу {@link http://codex.wordpress.org/Editing_wp-config.php Редактирование
 * wp-config.php} кодекса. Вы можете узнать настройки MySQL у Вашего хостера.
 *
 * Данный файл используется при создании wp-config.php во время установки.
 * Однако Вам не обязательно пользоваться Веб-интерфейсом, Вы можете просто скопировать его в
 * "wp-config.php" и самостоятельно заполнить значения.
 *
 * @package WordPress
 */

// ** Настройки MySQL - Вы можете получить эти данные у Вашего хостера ** //
/** Название базы данных WordPress */
define('DB_NAME', 'bookskg');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль MySQL */
define('DB_PASSWORD', 'root');

/** Хост MySQL */
define('DB_HOST', 'localhost');

/** Кодировка СУБД, используемая при создании таблиц. Едва ли Вам потребуется это изменять. */
define('DB_CHARSET', 'utf8');

/** Способ сравнения строк в СУБД. Не меняйте это значение, если сомневаетесь. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи аутентификации.
 *
 * Поменяйте эти строки на другие уникальные фразы! Если Вы этого не сделаете, безопасность Вашего блога будет под угрозой.
 * Вы можете сгенерировать их при помощи специального сервиса {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Вы можете поменять их в любой момент. Это приведет к тому, что всем пользователям нужно будет входить в систему заново.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '47bl;g-{9IbN^S`Nq[Iup[pmuJ5=R>OdZVcl?_1RjYCwev** #Qtj>^ipsxGj,y]');
define('SECURE_AUTH_KEY',  'trnt;wiYM#BC&e9cGs+qZ5f$IMTMp?DWED $UK{ljaV<+,rAh,+a?UTHkEwb77CR');
define('LOGGED_IN_KEY',    ';cDEZ9%Djum!hpfc&VOs2&TUIg`9^ gBwy/$qTw`3EVDg!@1vf`qSFv.2#hG[pu`');
define('NONCE_KEY',        'aC],[V$VMKEg48R_<jX&KMrca)Dd(2j1ZnyV)c-!4bHK2tAR}zenl`0(pajpggQD');
define('AUTH_SALT',        't5BYP&QgU=n4(GE3AJUU>[x2Qb$Mozk,^y$|Aw%&=H3&DqRq*TbE0S 0y)I7U0[*');
define('SECURE_AUTH_SALT', '3oq|sS3f:3$oMvIO;(%0ikZ-D%BJeTE[^I/e[@?H%Z;12[YA9[fOXL[UIMY7^eH*');
define('LOGGED_IN_SALT',   'ig+52uIe;Z{mbx(zhe+kQy;Cgo?g6?%1,^4UEAo92[M1k[`?EkR%~S-NEQ+=|d_%');
define('NONCE_SALT',       '-]w?KXB&nk#]&:uzzo<UVNUyoR~/|T2M4UQE_Mr}gY-(v*ScaMP+HUZAr%jE/`rh');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Вы можете иметь несколько установок в одной БД, давая им различные префиксы.
 * Пожалуйста, используйте только латинские буквы, арабские цифры и знаки подчеркивания!
 */
$table_prefix  = 'libkg_';

/**
 * Язык локализации WordPress.
 *
 */
define ('WPLANG', 'ru_RU');

/**
 * Для разработчиков: включение режима отладки WordPress.
 *
 * Поменяйте это значение на true, если хотите видеть сообщения по ходу разработки.
 * Крайне рекомендуется использовать WP_DEBUG разрабочикам тем и плагинов в своей среде разработки.
 */
define('WP_DEBUG', false);

/* Все, больше редактировать ничего не надо! Счастливых публикаций. */

/** Абсолютный путь к каталогу WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Настраивает переменные и модули WordPress. */
require_once(ABSPATH . 'wp-settings.php');
