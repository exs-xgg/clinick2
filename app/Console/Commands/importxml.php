<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Exception;
use Carbon\Carbon;
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
        $count = 0;
        $out = [];
        foreach ($dataxml as $key) {

            echo $count . ' = '. $key->ID->__toString() . PHP_EOL;

            try {
                $myfile = fopen("Data Library/" . $key->ID->__toString() . "/user-resx.CLINICK", "r") or die("Unable to open file!");
                $fstream = fread($myfile,filesize("Data Library/" . $key->ID->__toString() . "/user-resx.CLINICK"));
                $records =  explode("\r\n",$fstream);

                $reps = [];
                foreach ($records as $a) {
                    if ($a){
                        $a = trim($a);
                        $a = $this->transform_date($a);
                        $info = $infoxml->xpath('//InfoDB/ID[.="'.$a.'"]');
                        if($info){
                            $parent = (($info[0]??null)->xpath("parent::*"))[0];

                            $reps[] = ['created_at' =>($a),
                             'updated_at' =>($a),
                             'symptoms' => $parent->Proc->__toString()??null,
                             'diagnosis' => $parent->Diagnosis->__toString()??null,
                             'prescription' => $parent->Meds->__toString()??null,
                             'history' => $parent->Notes->__toString()??null];
                        }else{
                            echo "xxxxxxxxxxxxxxxxxxxxxx $a" . PHP_EOL;
                            $out[] = $a;
                        }
                    }
                }

            } catch (Exception $e) {
                $reps = [];
                $recs = $infoxml->xpath('//InfoDB/Username[.="'.$key->Name1->__toString().'"]');
                foreach ($recs as $k) {
                    $parent = (($k[0]??null)->xpath("parent::*"))[0];
                    $reps[] = [
                        'created_at' => $this->toDate($parent->ID->__toString()),
                        'updated_at' => $this->toDate($parent->ID->__toString()),
                        'symptoms' => $parent->Proc->__toString(),
                        'diagnosis' => $parent->Diagnosis->__toString(),
                        'prescription' => $parent->Meds->__toString(),
                        'history' => $parent->Notes->__toString()
                    ];
                }


            }finally{

                $f = [
                    'id' => $key->ID->__toString(),
                    'lname' => $key->Name1->__toString(),
                    'birthdate' => $key->Age->__toString(),
                    'sex' => $this->isDash($key->Sex->__toString()),
                    'civil_stat' =>  $this->isDash($key->CivilStat->__toString(),1),
                    'contact_no' =>  $this->isDash($key->Contact->__toString()),
                    'occupation' => $key->Occuption->__toString(),
                    'hmo' => $key->HMO->__toString(),
                    'address' => $key->Address->__toString(),
                    'visit' => $reps
                ];
                $x[] = $f;
            }
            $count++;

        }
        dd($out);
    }

    public function transform_date($item1){
        $item1 = str_replace('/','+',$item1);
        $item1 = str_replace(':','',$item1);
        $item1 = str_replace(' ','',$item1);
        return $item1;
    }
    public function toDate($date){
        $date = explode('+',$date);
        try {
            $year = substr($date[2],0,4);
            $timeH = explode('',substr($date[2],4,2));
            $timeM = explode('',substr($date[2],6,2));
            $timeA = explode('',substr($date[2],10,2));
            return Carbon::parse($year . '-' . $date[0] . '-' . $date[1] . ' ' . $timeH[0] . ':' . $timeM[0] . ' ' . $timeA[0])->toString();
        } catch (Exception $e) {
            return Carbon::parse('')->toString();
        }

    }

    public function isDash($str,$cap=0){
        if ($str == '-----') {
            return 'NA';
        }else{
            if($cap==1){
                return strtoupper($str[0] ?? '');
            }else{

                return ($str[0] ?? '');
            }
        }
    }
}
