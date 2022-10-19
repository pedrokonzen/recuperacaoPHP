<?php
class Aluno implements ActiveRecord
{
    private int $id;

    public function __construct(
        private string $nome,
        private string $materia,
        private int $nota,
        private int $frequencia
    ) {
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setMateria(string $materia): void
    {
        $this->materia = $materia;
    }

    public function getMateria(): string
    {
        return $this->materia;
    }

    public function setNota(int $nota): void
    {
        $this->nota = $nota;
    }

    public function getNota(): int
    {
        return $this->nota;
    }

    public function setFrequencia(int $frequencia): void
    {
        $this->frequencia = $frequencia;
    }

    public function getFrequencia(): int
    {
        return $this->frequencia;
    }
    // ______________________________________

    public function save(): bool
    {
        $conexao = new MySQL();
        if (isset($this->id)) {
            $sql = "UPDATE alunos SET 
        nome = '{$this->nome}' , 
        materia = '{$this->materia}' , 
        nota = '{$this->nota}' ,
        frequencia = '{$this->frequencia}'     
        WHERE 
        id = {$this->id}";
        } else {
            $sql = "INSERT alunos (nome, materia, nota, frequencia) 
        VALUES 
        ('{$this->nome}',
        '{$this->materia}',
        '{$this->nota}',
        '{$this->frequencia}'
        )";
        }
        return $conexao->executa($sql);
    }
    public function delete(): bool
    {
        $conexao = new MySQL();
        $sql = "DELETE FROM alunos WHERE id = {$this->id}";
        return $conexao->executa($sql);
    }

    public static function find($id): Aluno
    {
        $conexao = new MySQL();
        $sql = "SELECT * FROM alunos WHERE id = {$id}";
        $resultado = $conexao->consulta($sql);
        $a = new Aluno(
            $resultado[0]['nome'],
            $resultado[0]['materia'],
            $resultado[0]['nota'],
            $resultado[0]['frequencia']
        );
        $a->setId($resultado[0]['id']);
        return $a;
    }
    public static function findall(): array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM alunos";
        $resultados = $conexao->consulta($sql);
        $alunos = array();
        foreach ($resultados as $resultado) {
            $a = new Aluno(
                $resultado['nome'],
                $resultado['materia'],
                $resultado['nota'],
                $resultado['frequencia']
            );
            $a->setId($resultado['id']);
            $alunos[] = $a;
        }
        return $alunos;
    }

    public static function findallPMateriaMatematica(): array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM alunos WHERE materia = 'Matemática'";
        $resultados = $conexao->consulta($sql);
        $alunos = array();
        foreach ($resultados as $resultado) {
            $a = new Aluno(
                $resultado['nome'],
                $resultado['materia'],
                $resultado['nota'],
                $resultado['frequencia']
            );
            $a->setId($resultado['id']);
            $alunos[] = $a;
        }
        return $alunos;
    } 

    public static function findallPMateriaPortugues(): array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM alunos WHERE materia = 'Português'";
        $resultados = $conexao->consulta($sql);
        $alunos = array();
        foreach ($resultados as $resultado) {
            $a = new Aluno(
                $resultado['nome'],
                $resultado['materia'],
                $resultado['nota'],
                $resultado['frequencia']
            );
            $a->setId($resultado['id']);
            $alunos[] = $a;
        }
        return $alunos;
    }

    public static function findallPMateriaFilosofia(): array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM alunos WHERE materia = 'Filosofia'";
        $resultados = $conexao->consulta($sql);
        $alunos = array();
        foreach ($resultados as $resultado) {
            $a = new Aluno(
                $resultado['nome'],
                $resultado['materia'],
                $resultado['nota'],
                $resultado['frequencia']
            );
            $a->setId($resultado['id']);
            $alunos[] = $a;
        }
        return $alunos;
    }

    public static function findallPMateriaBiologia(): array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM alunos WHERE materia = 'Biologia'";
        $resultados = $conexao->consulta($sql);
        $alunos = array();
        foreach ($resultados as $resultado) {
            $a = new Aluno(
                $resultado['nome'],
                $resultado['materia'],
                $resultado['nota'],
                $resultado['frequencia']
            );
            $a->setId($resultado['id']);
            $alunos[] = $a;
        }
        return $alunos;
    }
}
