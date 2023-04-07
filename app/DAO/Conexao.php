<?php

namespace app\DAO;

class Conexao
{
    private static $instancia;

    public static function conecta()
    {
        if (!isset(self::$instancia)) :
            //essas informações é do meu banco local. NÃO COLOCAR NO BANCO EM PRODUÇÃO 
            self::$instancia = new \PDO('mysql:host=localhost;dbname=wp_casa_do_pao;charset=utf8', 'root', '');
        endif;
        return self::$instancia;
    }
}
