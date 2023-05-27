<?php
namespace classes;

require "TemplateException.php";

class Template
{
    /**
     * @var string
     */
    private string $tplPath = '';
    /**
     * @var array
     */
    private array $data = [];

    /**
     * Инициализация каталога с файлами шаблонов
     */
    public function __construct()
    {
        $this->tplPath = TEMPLATE_DIR . DIRECTORY_SEPARATOR;
    }

    /**
     * @param string $tpl
     * @param array $data
     * @return string
     * @throws \Exception
     */
    public function render(string $tpl, array $data = []): string
    {
        $this->data += $data;
        ob_start();

        if (file_exists($this->tplPath  . $tpl . '.php')) {
            require($this->tplPath . $tpl . '.php');
        } else {
            throw new TemplateException($tpl . ' - шаблон не найден!');
        }

        return ob_get_clean();
    }

    /**
     * @param string $name
     * @param $value
     * @return void
     */
    public function assign(string  $name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param string $varName
     * @return mixed
     */
    public function __get(string $varName)
    {
        return $this->data[$varName] ?? null;
    }
}