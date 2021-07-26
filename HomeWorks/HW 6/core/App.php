<?php 

namespace mvc\core;

class App 
{
    public static App $app;
    public static string $ROOT;

    private function __construct($root_dir)
    {
        self::$app = $this;
        self::$ROOT = $root_dir;
    }

    public static function get_instance($root_dir)
    {
        if (!isset(self::$app))
        {
            self::$app = new App($root_dir);
        }
        return self::$app;
    }

    public function run()
    {
        echo "Start";
    }
}

?>