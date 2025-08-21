<?php

namespace App\Console\Commands;

use App\Models\Tecnologia;
use Illuminate\Console\Command;

class CreateTecnologia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:tecnologia {nome} {caminho}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria uma tecnologia';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $nome = $this->argument("nome");
        $caminho = $this->argument("caminho");

        Tecnologia::create([
            'nome'=>$nome,
            'caminho_logo'=>$caminho,
            'codigo'=> hash("sha256", mb_strtoupper($nome))
        ]);

        $this->info("Tecnologia criada com sucesso");
        return 1;
    }
}
