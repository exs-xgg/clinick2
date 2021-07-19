<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Exception;

class importxml extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $x = [];

        $dataxml=simplexml_load_file("DataDB.xml") or die("Error: Cannot create object");


        $infoxml=simplexml_load_file("InfoDB.xml") or die("Error: Cannot create object");
        $rs = $infoxml->xpath('//InfoDB/Username[.="ABAD, ANTHONY"]');
        foreach ($rs as $key) {
            $records[] = (($rs[0]??null)->xpath("parent::*"))[0]->ID->__toString();
        }
        $count = 0;
        foreach ($dataxml as $key) {
            try {
                $myfile = fopen("Data Library/" . $key->ID->__toString() . "/user-resx.CLINICK", "r") or die("Unable to open file!");
                $records =  explode("\r\n",fread($myfile,filesize("Data Library/1/user-resx.CLINICK")));
            } catch (Exception $e) {
                $records = $infoxml->xpath('/InfoDB/Username[.="TIMBANG, EMMANUEL"]');
            }finally{
                echo $count . ' = '. $key->ID->__toString() . PHP_EOL;

                array_walk($records, array($this, 'transform_date'));
                $x[] = [
                    'id' => $key->ID->__toString(),
                    'lname' => $key->Name1->__toString(),
                    'birthdate' => $key->Age->__toString(),
                    'sex' => $key->Sex->__toString(),
                    'civil_stat' => $key->CivilStat->__toString(),
                    'contact_no' => $key->Contact->__toString(),
                    'occupation' => $key->Occuption->__toString(),
                    'hmo' => $key->HMO->__toString(),
                    'address' => $key->Address->__toString(),
                    'visit' => $records
                ];
                $count++;
            }

        }
        dd($x[6350]);
    }

    public function transform_date(&$item1, $key){
        $item1 = str_replace('/','+',$item1);
        $item1 = str_replace(':','',$item1);
        $item1 = str_replace(' ','',$item1);
    }
}
