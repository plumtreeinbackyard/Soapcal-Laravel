@extends('layouts.master')

@section('content')
    <div class="recipe-container">
        <div class="container recipe-content">
        
            <h2 class="text-center">
                Recipe - <span id="recipeName">{{ $recipeName }}</span>
                <button id="changeName" class="btn btn-outline-secondary btn-sm" style="background-image: url('/img/edit_white_24dp.png'); width: 26px; height: 26px;"></button>
            </h2>
            
            <div class="row">
                <div class="col-sm-12">
                    <div id="newNameDiv" class="input-group mb-3" style="display:none;">
                        <input type="text" id="newName" name="newName" class="form-control" placeholder="New recipe name" aria-label="New recipe name" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button id="saveName" class="btn btn-outline-secondary" type="button">Save</button>
                        </div>
                    </div>
                </div>
            </div>
           
  
                
            <div class="row">
                <div class="col-sm-12"> 
                    <p>Total oil weight : <span id="totalOilWeight">{{ $totalOilWeight.$unit }}</span></p>
                </div>
            </div>
                
            <div class="row">        
                
                <div class="col-sm-4">            
                        <ul id="selectedOil" style="list-style-type:none; padding-left: 0;">
                            @foreach ($selectedOilArr as $oil)
                                <li>{{ $oil." :" }}</li>
                            @endforeach
                        </ul>
                </div>
                
                <div class="col-sm-8">            
                        <ul id="oilWeight" style="list-style-type:none; padding-left: 0;">       
                            @for ($i=0; $i < count($oilWeightArr); $i++) 
                                    <li>{{ $oilWeightArr[$i].$unit }} , {{ $oilPercArr[$i]."%" }}</li>                            
                            @endfor
                        </ul>    
                </div>
                    
            </div>
                
            <hr>
                
            <div class="row">
                <div class="col-sm-4">
                    <p>NaOH :</p>
                </div>
                    
                <div id="totalNaoh" class="col-sm-8">
                    {{ $totalNaoh.$unit }}
                </div>    
            </div>
                
            <div class="row">
                <div class="col-sm-4">
                    <p>Water :</p>
                </div>
                    
                <div id="water" class="col-sm-8">
                    {{ $water.$unit }}
                </div>    
            </div>
                
            <hr>
            
            <div class="row">
                <div class="col-sm-4">
                    <p>Soap weight :</p>
                </div>
                    
                <div id="soapWeight" class="col-sm-8">
                    {{ $soapWeight.$unit }}
                </div>    
            </div>
                
            <div class="row">
                <div class="col-sm-4">
                    <p>INS value :</p>
                </div>
                    
                <div id="ins" class="col-sm-8">
                    {{ $ins }}
                </div>    
            </div>          
            
            <div class="form-group text-center" style="margin-top: 2em;">    
                <button id="download" class="btn btn-primary">Download recipe</button>
            </div>
        </div>
    </div>    

    
@endsection