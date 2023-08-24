<?php

namespace Sistema\Arquitetura\Aplicacao\Aluno\MatricularAluno;

use Sistema\Arquitetura\Dominio\Aluno\Aluno;
use Sistema\Arquitetura\Dominio\Aluno\RepositorioDeAluno;

class MatricularAluno
{
    private RepositorioDeAluno $repositorioDeAluno;

    public function __construct(RepositorioDeAluno $repositorioDeAluno)
    {
        $this->repositorioDeAluno = $repositorioDeAluno;
    }

    public function executa(MatricularAlunoDto $dados): void
    {
        $aluno = Aluno::comCpfNomeEEmail($dados->cpfAluno, $dados->nomeAluno, $dados->emailAluno);
        $this->repositorioDeAluno->adicionar($aluno);
    }
}
