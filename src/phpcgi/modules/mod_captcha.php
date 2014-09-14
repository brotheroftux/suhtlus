<?

// mod_captcha.php
// captcha module for suhtlus
// copyright brotheroftux 2014
// this code is distributed under GPLv3 license

class mod_captcha
{
    private $isYandexCaptcha;
    private $picsSet;
    private $url_api = 'http://cleanweb-api.yandex.ru/1.0/';
    private $api_key = 'cw.1.1.20140418T110826Z.ba1cca25aeff9b7c.5ab10d06ce45deaadba5faa3176b16ccf45f0778';

    public function __construct() {}
    public static function initWithYandexCaptcha(){
        $instance = new self();
        $instance->init(true);
        return $instance;
    }

    public static function initWithBuiltInCaptcha(){
        $instance = new self();
        $instance->init(false);
        return $instance;
    }

    public function init($isYandex, $set = NULL){
        $isYandexCaptcha = $isYandex;
        $picsSet = $set;
    }

    public function getCaptcha(){
        if($isYandexCaptcha == true){
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_URL, $url_api."get-captcha?key=".$api_key);
            $response = new SimpleXMLElement(curl_exec($curl));
            return array( "captcha" => $response->captcha, "img-url" => $response->url );
        }
        // TODO: add built-in captcha implementation
    }

    public function checkCaptcha($id, $value){
        if($isYandexCaptcha == true){
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_URL, $url_api."check-captcha?key=".$api_key."&captcha=".$id."&value=".$value);
            $response = new SimpleXMLElement(curl_exec($curl));
            if (property_exists($response, 'ok')) return array ( "response" => true );
            else return array ( "response" => false );
        }
        // TODO: add built-in captcha implementation
}

?>