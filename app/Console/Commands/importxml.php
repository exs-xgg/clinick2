<?php

namespace App\Console\Commands;
use App\Models\Patient;
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
        $total = $dataxml->DataDB->count();

        $infoxml=simplexml_load_file("InfoDB.xml") or die("Error: Cannot create object");
        $count = 1;
        $out = [];
        $images = [];
        foreach ($dataxml as $key) {

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


            }

            try {

                $imagefile = fopen("Data Library/" . $key->ID->__toString() . "/image-resx.CLINICK", "r") or die("Unable to open file!");
                $imagestream = fread($imagefile,filesize("Data Library/" . $key->ID->__toString() . "/image-resx.CLINICK"));
                $images[] =  explode("\r\n",$imagestream);
            } catch (Exception $e) {
                //throw $th;
            }
            $f = [
                'temp_id' => $key->ID->__toString(),
                'lname' => $key->Name1->__toString(),
                'fname' => '',
                'birthdate' => $key->Age->__toString(),
                'sex' => $this->isDash($key->Sex->__toString()),
                'civil_stat' =>  $this->isDash($key->CivilStat->__toString(),1),
                'contact_no' =>  $this->isDash($key->Contact->__toString()),
                'occupation' => $key->Occuption->__toString(),
                'hmo' => $key->HMO->__toString(),
                'address' => $key->Address->__toString(),
                // 'visit' => $reps,
                // 'images' => $images
            ];
            $patient = new Patient();
            $patient->fill($f);

            $patient->save();

            $this->show_status($count, $total);
            $count++;
            // break;
        }

        $fp = fopen('patients.txt', 'w');
        fwrite($fp, json_encode($x, false));
        fclose($fp);

        $fp = fopen('out.tx', 'w');
        fwrite($fp, json_encode($out, false));
        fclose($fp);

        echo 'DONE';
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
    function show_status($done, $total, $size=30) {

        static $start_time;

        // if we go over our bound, just ignore it
        if($done > $total) return;

        if(empty($start_time)) $start_time=time();
        $now = time();

        $perc=(double)($done/$total);

        $bar=floor($perc*$size);

        $status_bar="\r[";
        $status_bar.=str_repeat("=", $bar);
        if($bar<$size){
            $status_bar.=">";
            $status_bar.=str_repeat(" ", $size-$bar);
        } else {
            $status_bar.="=";
        }

        $disp=number_format($perc*100, 0);

        $status_bar.="] $disp%  $done/$total";

        $rate = ($now-$start_time)/$done;
        $left = $total - $done;
        $eta = round($rate * $left, 2);

        $elapsed = $now - $start_time;

        $status_bar.= " remaining: ".number_format($eta)." sec.  elapsed: ".number_format($elapsed)." sec.";

        echo "$status_bar  ";

        flush();

        // when done, send a newline
        if($done == $total) {
            echo "\n";
        }

    }
}
