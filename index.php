<?php
require_once __DIR__ . '/vendor/autoload.php';


interface iFormatter
{
    public function format($string);

}

interface iDelivered
{
    public function deliver($format);

}

class FormatterRaw implements iFormatter
{
    public function format($string)
    {
        return $string;
    }
}

class FormatterDate implements iFormatter
{
    public function format($string): string
    {
        return date('Y-m-d H:i:s') . ' ' . $string;
    }
}

class FormatterDateDetails implements iFormatter
{
    public function format($string): string
    {
        return date('Y-m-d H:i:s') . ' ' . $string . ' - With some details';
    }
}

class DeliveredEmail implements iDelivered
{
    public function deliver($format): string
    {
        return "Вывод формата ({$format}) по имейл";
    }
}

class DeliveredSMS implements iDelivered
{
    public function deliver($format): string
    {
        return "Вывод формата ({$format}) в смс";
    }
}

class DeliveredConsole implements iDelivered
{
    public function deliver($format): string
    {
        return "Вывод формата ({$format}) в консоль";
    }
}

class Logger
{
    private iFormatter $formatter;
    private iDelivered $delivered;

    public function __construct(iFormatter $formatter, iDelivered $delivered)
    {

        $this->formatter = $formatter;
        $this->delivered = $delivered;
    }

    public function log($string): string
    {
        return $this->delivered->deliver($this->formatter->format($string));
    }
}

$formatter = new FormatterDateDetails();
$delivered = new DeliveredSMS();
$logger = new Logger($formatter, $delivered);
d($logger->log('test'));