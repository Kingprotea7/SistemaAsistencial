<?php

namespace App\Console\Commands;

use App\Models\AlumnosModel;
use Illuminate\Console\Command;

class ResetAsistenciaRegistrada extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'asistencia:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset asistencia registrada for all students daily';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        AlumnosModel::query()->update(['asistencia_registrada' => false]);
        $this->info('Asistencia registrada reset for all students.');
        return Command::SUCCESS;
    }

}
