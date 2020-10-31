@extends('layouts.master')

@section('content')
    
    <div class="home-banner">
        <div class="container">
            <h1>SoapCal helps you to calculate how much oil, NaOH and water you need to make cold process soap bars.</h1>
            <a href="#cal-form"><img src="/img/expand_more_white_48dp.png"></a>
        </div>
    </div
    
    <p><a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@rickyzden?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Hans Vivek"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Hans Vivek</span></a></p>
    
    <div class="cal-form" id="cal-form">
        <div class="container">        
            <div class="row">
            
                <div class="col-sm-3 ad-bar" style="border: 1px solid #d4d4d4;">
                </div>
                    
                <div class="col-sm-9" style="padding-left: 2em;">
                    
                    <p><small>Fields marked with an * are required</small></p>
        
                    @include('layouts.errors')
            
                    <form method="POST" action="/recipe">
            
                        {{ csrf_field() }}          
                     
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <label for="oilPicker" style="margin-right: 1em;">Select oil *</label>
                                <select id="oilPicker" name="oilPicker" class="selectpicker form-control" multiple title="Nothing selected" data-selected-text-format="count" data-style="btn-primary" data-width="40%" data-size="8">
                                    @foreach ($sapArr as $key=>$value)
                                        <option value="{{ $key }}">{{ $key }}</option>
                                    @endforeach
                                </select>                                    
                                <button id="saveSelectedOil" type="button" class="btn btn-outline-secondary btn-sm" style="margin-left: 1em;">Save</button>                   
                            </div> 
                        </div>
                        
                        <input type="hidden" id="selectedOil" name="selectedOil">
                        
                        <div id="output"></div>  
            
                        <hr>
                      
                        <div class="row form-group">
                          
                            <div class="col-sm-3">
                              <label for="naohDiscount">NaOH discount</label>
                            </div>
                              
                            <div class="col-sm-9">
                              <input type="text" id="naohDiscount" name="naohDiscount" placeholder="5~10" class="form-control"> %
                            </div>
                        </div>
                              
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label for="naohPurity">NaOH purity</label>
                            </div>
                                
                            <div class="col-sm-9">         
                                <input type="text" id="naohPurity" name="naohPurity" placeholder="95~99" class="form-control"> %      
                            </div>
                        </div>
                              
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label for="water">Water *</label>
                            </div>
                                
                            <div class="col-sm-9">
                                <input type="text" id="water" name="water" placeholder="2~3" class="form-control"> times of NaOH weight
                            </div>
                        </div>    
                              
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label for="sf">Superfatting</label>
                            </div>
                                
                            <div class="col-sm-9">
                                <input type="text" id="sf" name="sf" placeholder="1~5" class="form-control"> % of total oil weight
                            </div>
                        </div>
                              
                        <div class="row form-group">
                            <div class="col-sm-9 offset-sm-3">
                                <input type="text" id="sfName" name="sfName" placeholder="superfatting oil name" class="form-control">
                            </div>
                        </div>
                              
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label for="eo">Essential oil</label>
                            </div>
                                
                            <div class="col-sm-9">
                                <input type="text" id="eo" name="eo" placeholder="0~2" class="form-control"> % of total soap weight
                            </div>
                        </div>
                              
                        <div class="row form-group">
                            <div class="col-sm-9 offset-sm-3">
                                <input type="text" id="eoName" name="eoName" placeholder="Essential oil name" class="form-control">
                            </div>
                        </div>
                              
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label for="additive">Additive</label>
                            </div>
                                
                            <div class="col-sm-9">
                                <input type="text" id="additive" name="additive" placeholder="0~2" class="form-control"> % of total soap weight
                            </div>
                        </div>
                              
                        <div class="row form-group">
                            <div class="col-sm-9 offset-sm-3">
                                <input type="text" id="adName" name="adName" placeholder="Additive name" class="form-control">
                            </div>
                        </div>              
                              
                        <div class="row form-group">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary">Calculate</button>
                            </div>
                        </div>          
                  
                    </form>
                </div>                    

            </div>
        </div>  <!--  end of container  -->
    </div>  <!--  end of cal-form  -->
    
@endsection