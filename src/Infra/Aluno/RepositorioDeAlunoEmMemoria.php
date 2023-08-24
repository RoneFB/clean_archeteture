<?php

namespace Sistema\Arquitetura\Infra\Aluno;

use Sistema\Arquitetura\Dominio\Aluno\Aluno;
use Sistema\Arquitetura\Dominio\Aluno\AlunoNaoEncontrado;
use Sistema\Arquitetura\Dominio\Aluno\RepositorioDeAluno;
use Sistema\Arquitetura\Dominio\Cpf;

class RepositorioDeAlunoEmMemoria implements RepositorioDeAluno
{
    private array $alunos = [];

    public function adicionar(Aluno $aluno): void
    {
        $this->alunos[] = $aluno;
    }

    public function buscarPorCpf(Cpf $cpf): Aluno
    {
        $alunosFiltrados = array_filter(
            $this->alunos,
            fn (Aluno $aluno) => $aluno->cpf() == $cpf
        );

        if (count($alunosFiltrados) === 0) {
            throw new AlunoNaoEncontrado($cpf);
        }

        if (count($alunosFiltrados) > 1) {
            throw new \Exception();
        }

        return $alunosFiltrados[0];
    }

    public function buscarTodos(): array
    {
        return $this->alunos;
    }
}
