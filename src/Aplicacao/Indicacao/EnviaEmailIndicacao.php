<?php

namespace Sistema\Arquitetura\Aplicacao\Indicacao;

use Sistema\Arquitetura\Dominio\Aluno\Aluno;

interface EnviaEmailIndicacao
{
    public function enviaPara(Aluno $alunoIndicado): void;
}
