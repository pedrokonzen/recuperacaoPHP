<?php
 
class Livro implements ActiveRecord{
    private float $id;

    public function __construct(
        private string $titulo, 
        private string $autoras, 
        private int $status){
        }
    
    public function setId(float $id):void{
        $this->id = $id;
    }
    
    public function getId():float{
        return $this->id;
    }

    public function setTitulo(string $titulo):void{
        $this->titulo = $titulo;
    }
    
    public function getTitulo():string{
        return $this->titulo;
    }

    public function setAutoras(string $autoras):void{
        $this->autoras = $autoras;
    }
    
    public function getAutoras():string{
        return $this->autoras;
    }

    public function setStatus(int $status):void{
        $this->status = $status;
    }
    
    public function getStatus():int{
        return $this->status;
    }


    // _____________________________________________

    public function save():bool{
        $conexao = new MySQL();
        if(isset($this->id)){
            $sql = "UPDATE livros SET 
            titulo = '{$this->titulo}' , 
            autoras = '{$this->autoras}' , 
            status = '{$this->status}'     
            WHERE 
            id = {$this->id}";
        }else{
            $sql = "INSERT livros (titulo,autoras,status) 
            VALUES 
            ('{$this->titulo}',
            '{$this->autoras}',
            '{$this->status}')";
        }
        return $conexao->executa($sql);
        
    }
    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM livros WHERE id = {$this->id}";
        return $conexao->executa($sql);
    }

    public static function find($id):Livro{
        $conexao = new MySQL();
        $sql = "SELECT * FROM livros WHERE id = {$id}";
        $resultado = $conexao->consulta($sql);
        $l = new Livro
        ($resultado[0]['titulo'],
        $resultado[0]['autoras'],
        $resultado[0]['status']);
        $l->setId($resultado[0]['id']);
        return $l;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM livros";
        $resultados = $conexao->consulta($sql);
        $livros = array();
        foreach($resultados as $resultado){
            $l = new Livro
            ($resultado['titulo'], 
            $resultado['autoras'], 
            $resultado['status']);
            $l->setId($resultado['id']);
            $livros[] = $l;
        }
        return $livros;
    }

    public static function findAllnaoLidos():array{
        $conexao = new MySQL();
        $sql = "SELECT * from livros where status = 0";
        $resultados = $conexao->consulta($sql);        
        $livros = array();
        foreach($resultados as $resultado){
            $l = new Livro
            ($resultado['titulo'], 
            $resultado['autoras'], 
            $resultado['status']);
            $l->setId($resultado['id']);
            $livros[] = $l;
        }
        return $livros;
    }

    public static function findAllLidos():array{
        $conexao = new MySQL();
        $sql = "SELECT * from livros where status = 1";
        $resultados = $conexao->consulta($sql);        
        $livros = array();
        foreach($resultados as $resultado){
            $l = new Livro
            ($resultado['titulo'], 
            $resultado['autoras'], 
            $resultado['status']);
            $l->setId($resultado['id']);
            $livros[] = $l;
        }
        return $livros;
    }
}