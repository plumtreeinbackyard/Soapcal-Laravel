<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calculate;
use Config;

class RecipeController extends Controller
{
    public function index(Calculate $calculate)
    {
       
        $this->validate(request(),[
            'selectedOil' => 'required',            
            'water' => 'required|numeric',           
        ]);  
        
        // selected oil name array
        $weightArr = [];        
        $nameArr = explode(",", request('selectedOil')); //convert string to array
        
        //$oil = ["Almond oil(sweet)","Aloe vera butter","Apricot kernel oil","Avocado oil","Babassu nut oil","Beeswax"];
        //$sap = ["0.138","0.178","0.138","0.137","0.174","0.065"];
        
        $sapArr = Config::get('oilnameandsap.sap');
        
        for ($i=0; $i<count($nameArr); $i++)  //request oil weight value, then add them into weight array
        { 
            $index = array_search($nameArr[$i], array_keys($sapArr));
            $name = "oil-" . $index;            
            array_push($weightArr, request($name));
        }
        $oilWeight = implode(",", $weightArr); //convert array to string    
        
        $unit = "g";
        $recipeName = time();
        
        $display = $calculate->recipe($oilWeight, request(['selectedOil','naohDiscount','naohPurity','water','sf','sfName','eo','eoName','additive','adName']));              
        list($totalOilWeight, $selectedOilArr, $oilWeightArr, $oilPercArr, $totalNaoh, $water, $soapWeight, $ins) = $display;
        return view('recipe.recipe', compact('unit', 'recipeName', 'totalOilWeight', 'selectedOilArr', 'oilWeightArr', 'oilPercArr', 'totalNaoh', 'water', 'soapWeight', 'ins'));
    }
}
