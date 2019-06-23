<?php

namespace Scripter;

class Scripter
{

    /**
     * @var Script[]
     */
    protected $scripts = [];

    /**
     * @return Script[]
     */
    public function getScripts()
    {
        return $this->scripts;
    }

    public function loadScripts(string $path): void
    {
        $filenames = glob($path . '/{**/*,*}', GLOB_BRACE);
        foreach ($filenames as $filename) {
            $filename = realpath($filename);
            if (
                is_executable($filename) &&
                is_file($filename)
            ) {
                $info = pathinfo($filename);

                $name = $info['filename'];
                $prefix = basename($info['dirname']);;
                if ($prefix !== 'scripts') {
                    $name = $prefix . ':' . $name;
                }

                $doc = null;
                if (file_exists($filename . '.md')) {
                    $doc = file_get_contents($filename . '.md');
                }

                $script = new Script($name, $filename, $doc);
                $this->scripts[$script->getName()] = $script;
            }
        }
    }
}