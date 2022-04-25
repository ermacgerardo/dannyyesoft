<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Exception;
use App\Traits\GlobalTrait;

class DatabaseBackUp extends Command
{
    /**
     * https://www.codecheef.org/article/laravel-7-daily-monthly-weekly-automatic-database-backup-tutorial
     * The name and signature of the console command.
     *
     * @var string
     * only_tables acepta false|true
     */
    protected $signature = 'database:backup {only_tables=all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ejecutar backup de la base de datos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $only_tables = $this->argument('only_tables');
        
        $filename = "backup-" . Carbon::now()->format('Y-m-d-H-i') . ".sql";
        
        
        if($only_tables=='only_tables'){
            $tables=env('TABLAS_A_RESPALDAR');
            $filename='only-tables-'.$filename;
        }else{
           $tables='' ;
        }
        if(env('DB_CONNECTION')=='mysql'){
            
            $tables= str_replace(',',' ',$tables);
            
            //Crea usuarios y corporativos automaticamente
            GlobalTrait::crearRegistros(1);
            
            /*
         * Aplicable si no se agrega mysqldump al path
         *  $command = "cd C:/xampp/mysql/bin/ & mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  $tables > " . storage_path() . "/app/backup/" . $filename;
         */
         //   $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  $tables > " . storage_path() . "/app/backup/" . $filename;
            $command = "cd C:/xampp/mysql/bin/ & mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  $tables > " . storage_path() . "/app/backup/" . $filename;
           
        }else{
            //En caso de que el respaldo no esta habilitado para el motor de base de datos que se utiliza
            return 'Backup no implementado para '.env('DB_CONNECTION');
        }
        
 
        $returnVar = NULL;
        $output  = NULL;
  
        exec($command, $output, $returnVar);
        return 'Archivo Backup '.$filename.' creado exitosamente';
    }
    
    
}
