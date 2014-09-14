<?

// mod_captcha.conf.php
// built-in captcha-generator config file
// protect this file somehow, e.g. with .htaccess

define("CAPTCHA_ID_LENGTH",               5); // captcha identificator length
define("CAPTCHA_VALID_IDS_FILE", "filename"); // filename where mod_captcha will store all valid captcha IDs

define("CAPTCHA_PIC_SETS", serialize(array(
    "anime" => array(
        "count" => 3, "keys" => array(
            "kurisu", "kagami", "cirno"
        )
    )
)));

?>