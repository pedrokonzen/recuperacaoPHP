<?php
 
class Receita implements ActiveRecord{
    private int $id;

    public function __construct(
        private string $titulo, 
        private string $ingredientes, 
        private int $categoria){
        }
    
    public function setId(int $id):void{
        $this->id = $id;
    }
    
    public function getId():int{
        return $this->id;
    }

    public function setTitulo(string $titulo):void{
        $this->titulo = $titulo;
    }
    
    public function getTitulo():string{
        return $this->titulo;
    }

    public function setIngredientes(string $ingredientes):void{
        $this->ingredientes = $ingredientes;
    }
    
    public function getIngredientes():string{
        return $this->ingredientes;
    }

    public function setCategoria(int $categoria):void{
        $this->categoria = $categoria;
    }
    
    public function getCategoria():int{
        return $this->categoria;
    }


    // _____________________________________________

    public function save():bool{
        $conexao = new MySQL();
        if(isset($this->id)){
            $sql = "UPDATE receitas SET 
            titulo = '{$this->titulo}' , 
            ingredientes = '{$this->ingredientes}' , 
            categoria = '{$this->categoria}'     
            WHERE 
            id = {$this->id}";
        }else{
            $sql = "INSERT receitas (titulo,ingredientes,categoria) 
            VALUES 
            ('{$this->titulo}',
            '{$this->ingredientes}',
            '{$this->categoria}')";
        }
        return $conexao->executa($sql);
        
    }
    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM receitas WHERE id = {$this->id}";
        return $conexao->executa($sql);
    }

    public static function find($id):Receita{
        $conexao = new MySQL();
        $sql = "SELECT * FROM receitas WHERE id = {$id}";
        $resultado = $conexao->consulta($sql);
        $r = new Receita
        ($resultado[0]['titulo'],
        $resultado[0]['ingredientes'],
        $resultado[0]['categoria']);
        $r->setId($resultado[0]['id']);
        return $r;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM receitas";
        $resultados = $conexao->consulta($sql);
        $receitas = array();
        foreach($resultados as $resultado){
            $r = new Receita
            ($resultado['titulo'], 
            $resultado['ingredientes'], 
            $resultado['categoria']);
            $r->setId($resultado['id']);
            $receitas[] = $r;
        }
        return $receitas;
    }

    public static function findAllEasy():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM receitas WHERE categoria = 5 OR categoria = 4 OR categoria = 3";
        $resultados = $conexao->consulta($sql);        
        $receitas = array();
        foreach($resultados as $resultado){
            $r = new Receita
            ($resultado['titulo'], 
            $resultado['ingredientes'], 
            $resultado['categoria']);
            $r->setId($resultado['id']);
            $receitas[] = $r;
        }
        return $receitas;
    }

    public static function findAllHard():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM receitas WHERE categoria = 1 OR categoria = 2";
        $resultados = $conexao->consulta($sql);        
        $receitas = array();
        foreach($resultados as $resultado){
            $r = new Receita
            ($resultado['titulo'], 
            $resultado['ingredientes'], 
            $resultado['categoria']);
            $r->setId($resultado['id']);
            $receitas[] = $r;
        }
        return $receitas;
    }

    public static function findAllPorDificuldade():array{
        $conexao = new MySQL();
        $sql = "SELECT categoria as 'Categoria', COUNT(categoria) as 'Quantidade' FROM `receitas` GROUP BY categoria";
        $resultados = $conexao->consulta($sql);
        return $resultados;
    }
    
}