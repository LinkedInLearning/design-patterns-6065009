<?php
class Config{
    private array $config;
    
    public function __construct(){
        $this->config = [
            'colorteme' => 'dark',
            'lang'      => 'de'
        ];
    }

    public function get ( $key ) {
        return $this->config[ $key ] ?? null;
    }
}

// Client Code
$config = new Config();
echo $config->get('lang');