<?php

namespace app\modules\tasks\services;

class CodeGenerate
{
    public static string $taskPrefix = 'TASK';
    public static string $ticketPrefix = 'TICKET';

    public static function generateTaskCode(): string
    {
        return self::$taskPrefix . date('Ymd') . rand(1000, 9999);
    }

    public static function generateTicketCode(): string
    {
        return self::$ticketPrefix . date('Ymd') . rand(1000, 9999);
    }
}
