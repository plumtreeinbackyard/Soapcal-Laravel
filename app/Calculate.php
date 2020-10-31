<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Config;

class Calculate extends Model
{
    public function recipe($oilWeight, $arr)
    {
        $unit = "g";
        //$oil = ["Almond oil(sweet)","Aloe vera butter","Apricot kernel oil","Avocado oil","Babassu nut oil","Beeswax"];
        //$sap = ["0.138","0.178","0.138","0.137","0.174","0.065"];        
        $sapArr = Config::get('oilnameandsap.sap');
        
        $selectedOilArr = explode(",", $arr['selectedOil']);
        $oilWeightArr = explode(",", $oilWeight); 
        
        // get total oil weight and total NaOH weight
        $totalOilWeight = 0;
        $totalNaoh = 0;        
        
        for ($i=0; $i<count($selectedOilArr);$i++)
        {
            //$index = array_search($selectedOilArr[$i], $oil);
            $oilSap = $sapArr[$selectedOilArr[$i]];
            
            $totalOilWeight += (double)$oilWeightArr[$i];
            
            $singleNaoh = (double)$oilWeightArr[$i] * (double)$oilSap;
            $totalNaoh += $singleNaoh;
        }  
        
        // get single oil percentage
        $oilPercArr = [];
        for ($i=0; $i<count($selectedOilArr);$i++)
        {
            $perc = round((double)$oilWeightArr[$i] / $totalOilWeight * 100);            
            array_push($oilPercArr, $perc);
        }
        
        // get water weight
        $water = $totalNaoh * $arr["water"];
        
        // get soap INS value
        $ins = 0;
        $insArr = Config::get('oilnameandins.ins');
        
        for ($i=0; $i<count($selectedOilArr);$i++)
        {
            $singleIns = $insArr[$selectedOilArr[$i]];
            $ins += $oilPercArr[$i] / 100 * (double)$singleIns;
        }
        $ins = round($ins);
        
        // get total soap weight
        $soapWeight = $totalOilWeight + $totalNaoh + $water;
        
        return array($totalOilWeight, $selectedOilArr, $oilWeightArr, $oilPercArr, $totalNaoh, $water, $soapWeight, $ins);
        
    }
}

