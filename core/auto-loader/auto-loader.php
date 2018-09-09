<?php
    namespace TRex;

    use TRex\AutoLoader\Finder;

    require_once TREX_ROOT . 'core/auto-loader/finder.php';

    class AutoLoader
    {
        private static $exception       = false;		// Gerar Exception se não encontrar classe.


        public static function init()
        {
            spl_autoload_register(array('\\TRex\\AutoLoader', 'loadClass'));
        }

        public static function loadClass(string $name, string $type = 'require', bool $once = true)
        {
            $finder = new Finder($name);

            if(empty($finder->path))
            {
                if(self::$exception) throw new \Exception('File not found - ' . $name);
            }

            if(empty($finder->path))
            {
                return false;
            }

            self::load($finder->path, $type, $once);
        }

        private static function load(string $name, string $type, bool $once)
        {

            if($type === 'require')
            {
                return ($once) ? require_once($name) : require($name);
            }
            else
            {
                return ($once) ? include_once($name) : include($name);
            }
        }
    }