<?php
final class Database{
    private static $instance = null;

private $connection;

private function __construct(){
    try{
        $confing = parse_ini_file(__DIR__.'/../config.ini',true)['database'];
        $dsn='';
        if($confing['driver']==='mysql'){
            $dsn= "mysql:host={$confing['host']};port={$confing['port']};dbname={$confing['dbname']};charset=utf8";
        }elseif($confing['driver']==='pgsql'){ 
            $dsn= "pgsql:host={$confing['host']};port={$confing['port']};dbname={$confing['dbname']}";
        }else{
            throw new exception("Driver de banco de dado não suportado.".$confing['driver']);
        }
        $this->connection = new PDO($dsn, $confing['username'], $confing['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        error_log(' Erro de conexão'.$e->getMessage());
        die('Erro ao conectar com o banco de dados. Tente novamente mais tarde.');
    }
}
public static function getInstance(){
    if (self::$instance === null){
        self::$instance = new Database();
    }
    return self::$instance;
}
public function getConnection(){
    return $this->connection;
}
}