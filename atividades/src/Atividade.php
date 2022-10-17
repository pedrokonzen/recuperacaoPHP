// okokokokokokkokokoko

<?php
class Atividade implements ActiveRecord 
{
    private float $id;
    // construtor
    public function __construct(
        private string $descricao,
        private string $data,
        private int $status
    ) {
    }
    // id
    public function setId(float $id): void
    {
        $this->id = $id;
    }
    public function getId(): float
    {
        return $this->id;
    }
    // descricao
    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }
    public function getDescricao(): string
    {
        return $this->descricao;
    }
    // data
    public function setData(string $data): void
    {
        $this->data = $data;
    }
    public function getData(): string
    {
        return $this->data;
    }
    // status
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }
    public function getStatus(): int
    {
        return $this->status;
    }
    // _____________________________________________________________
    public function save(): bool
    {
        $conexao = new MySQL();
        if (isset($this->id)) {
            $sql = "UPDATE atividades SET 
        descricao = '{$this->descricao}' , 
        data = '{$this->data}' , 
        status = '{$this->status}'     
        WHERE 
        id = {$this->id}";
        } else {
            $sql = "INSERT atividades (descricao,data,status) 
        VALUES 
        ('{$this->descricao}',
        '{$this->data}',
        '{$this->status}')";
        }
        return $conexao->executa($sql);
    }
    public function delete(): bool
    {
        $conexao = new MySQL();
        $sql = "DELETE FROM atividades WHERE id = {$this->id}";
        return $conexao->executa($sql);
    }

    public static function find($id): Atividade
    {
        $conexao = new MySQL();
        $sql = "SELECT * FROM atividades WHERE id = {$id}";
        $resultado = $conexao->consulta($sql);
        $a = new Atividade(
                $resultado[0]['descricao'],
                $resultado[0]['data'],
                $resultado[0]['status']
            );
        $a->setId($resultado[0]['id']);
        return $a;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM atividades ORDER BY data ASC";
        $resultados = $conexao->consulta($sql);
        $atividades = array();
        foreach($resultados as $resultado) {
            $a = new Atividade
            ($resultado['descricao'],
            $resultado['data'],
            $resultado['status']);
            $a->setId($resultado['id']);
            $atividades[] = $a;
        }
        return $atividades;
    }
    public static function findallREALIZADAS():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM atividades WHERE status = 0 ORDER BY data ASC";
        $resultados = $conexao->consulta($sql);
        $atividades = array();
        foreach($resultados as $resultado) {
            $a = new Atividade
            ($resultado['descricao'],
            $resultado['data'],
            $resultado['status']);
            $a->setId($resultado['id']);
            $atividades[] = $a;
        }
        return $atividades;
    }
    public static function findallPENDENTES():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM atividades WHERE status = 1 ORDER BY data ASC";
        $resultados = $conexao->consulta($sql);
        $atividades = array();
        foreach($resultados as $resultado) {
            $a = new Atividade
            ($resultado['descricao'],
            $resultado['data'],
            $resultado['status']);
            $a->setId($resultado['id']);
            $atividades[] = $a;
        }
        return $atividades;
    }
}
