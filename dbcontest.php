<?php
ini_set('display_errors', 1);

class Acesso
{
    protected static $db;
    private function __construct()
    {
        $db_host = "localhost";
        $db_database = "crfsp010_eventos";
        $db_usuario = "crfsp010_eventos";
        $db_senha = "EVT#8745@";
        $db_driver = "mysql";

        //FARMACEUTICO
        // $db_host = "177.54.146.226";
        // $db_database = "farmaceu_eventos";
        // $db_usuario = "farmaceu_agenda";
        // $db_senha = "comunicavalente487#crf";
        // $db_driver = "mysql";

        try {
            self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_database", $db_usuario, $db_senha);
            # Permite ao PDO lançar exceções durante erros.
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            # Dados armazenados com codificação UTF-8 caso deseje assim
            self::$db->exec('SET NAMES utf8');
        } catch (PDOException $e) {
            # Parar carregamento da página
            die("Connection Error: " . $e->getMessage());
        }
    }

    public static function conexao()
    {
        if (!self::$db) {
            new Acesso;
        }
        return self::$db;
    }
}
