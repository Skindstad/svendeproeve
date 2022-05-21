<?php

namespace App;

use PDO;

/* $name = "svendepoeve";
$host = "127.0.0.1";
$user = "root";
$pass = ""; */


class DB
{
    protected static PDO $pdo;

    public static function init(): void
    {
        $name = "svendeproeve";
        $host = "127.0.0.1";
        $user = "root";
        $pass = "";
        $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8;', $host, $name);
        self::$pdo = new PDO($dsn, $user, $pass);
        self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        self::$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    public static function select(string $query, array $params = []): array
    {
        $stmt = self::$pdo->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll();
    }

    public static function selectFirst(string $query, array $params = []): ?array
    {
        return self::select($query, $params)[0] ?? null;
    }

    protected static function nonSelect(string $query, array $params = []): bool
    {
        $stmt = self::$pdo->prepare($query);
        return $stmt->execute($params);
    }

    public static function insert(string $query, array $params = []): bool
    {
        return self::nonSelect($query, $params);
    }

    public static function update(string $query, array $params = []): bool
    {
        return self::nonSelect($query, $params);
    }

    public static function delete(string $query, array $params = []): bool
    {
        return self::nonSelect($query, $params);
    }
}

DB::init();
