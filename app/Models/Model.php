<?php

namespace App\Models;

use PDO;

use Database\DBConnection;
use App\Exceptions\NotFoundException;

abstract class Model
{

    /**
     * METHODE D'INSTANCE DE PDO
     */
    protected static function db(): PDO
    {
        return (new DBConnection())->getPDO();
    }

    static function all()
    {
        $table =  self::table();

        $req = static::query("SELECT * FROM $table ORDER BY id DESC");
        return $req;
    }

    static function take(int $nb = 15)
    {
        $table =  self::table();

        $req = static::query("SELECT * FROM $table ORDER BY id DESC LIMIT $nb");
        return $req;
    }


    static function find($id)
    {
        $table =  self::table();

        $req = static::prepare("SELECT * FROM $table WHERE id= ?", [$id], true);
        return $req;
    }

    public static function exist_id($id)
    {
        $table =  self::table();

        $req = static::db()->prepare("SELECT * FROM $table WHERE id = :id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $exist = $req->rowCount();
        return $exist;
    }

    static function findOrFail($id)
    {
        $exist_id = static::exist_id($id);

        if ($exist_id === 0) {
            NotFoundException::erro404();
        } else {
            return static::find($id);
        }
    }


    public static function nombre($params = [])
    {
        $table =  self::table();
        $req = static::db()->prepare("SELECT * FROM $table WHERE $params[0] = :$params[1]");
        $req->bindValue(":$params[1]", $params[1], PDO::PARAM_INT);
        $req->execute();
        $exist = $req->rowCount();
        return $exist;
    }




    private static function table(): string
    {

        $tab = strtolower(explode('\\', static::class)[2] . 's');
        return $tab;
    }


    /**
     * METHODE QUERY
     */
    public static function query($sql, string $params = null)
    {
        $req = static::db()->query($sql);

        if (is_null($params)) {
            /* Rehefa null le single  */
            return $req->fetchAll(PDO::FETCH_OBJ);
        } else {
            return $req->fetch(PDO::FETCH_OBJ);
        }
    }

    /**
     * METHODE PREPARE
     */

    public static function prepare($sql, $data = [], string $params =  null)
    {

        $req = static::db()->prepare($sql);
        $req->execute($data);

        if (strpos($sql, 'SELECT') === 0 && is_null($params)) {
            return $req->fetchAll(PDO::FETCH_OBJ);
        } else if (strpos($sql, 'SELECT') === 0 && !is_null($params)) {
            return $req->fetch(PDO::FETCH_OBJ);
        }
    }


    public static function create(array $data)
    {
        $table =  self::table();
        $premierParentheses = "";
        $secondParentheses = "";
        $i = 1;

        foreach ($data  as $key => $value) {
            $comma = $i === count($data) ? "" : ", ";
            $premierParentheses .= "{$key}{$comma}";
            $secondParentheses .= ":{$key}{$comma}";
            $i++;
        }

        $sql = "INSERT INTO {$table} ($premierParentheses) VALUES($secondParentheses)";
        static::prepare($sql, $data);
    }

    public static function update(int $id, array $data)
    {
        $table =  self::table();
        $sqlRequestPart = "";
        $i = 1;
        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? " " : ', ';
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";
            $i++;
        }

        $data['id'] = $id;

        $sql = "UPDATE {$table} SET {$sqlRequestPart} WHERE id = :id";
        static::prepare($sql, $data);
    }
}
