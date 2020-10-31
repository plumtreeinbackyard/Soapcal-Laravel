@extends('layouts.master')

@section('content')
    <div id="contact">
    <div class="container"> 
            
        <h2>Contact</h2>
            
        {{ $data }}
        
        @include('layouts.errors')
        
        <form method="post" action="/contact">
        
            {{ csrf_field() }}
            
            <div class="row form-group">
                 <div class="col-md-2 offset-md-3">       
                    <label for="name">Name *</label>
                 </div>
                 <div class="col-md-7">
                    <input type="text" name="name" id="name" class="form-control" required>
                 </div>
            </div>
            
            <div class="row form-group">
                 <div class="col-md-2 offset-md-3"> 
                    <label for="email">Email *</label>
                 </div>
                 <div class="col-md-7">   
                    <input type="email" name="email" id="email" class="form-control" required>
                 </div>
            </div>
            
            <div class="row form-group">
                 <div class="col-md-2 offset-md-3">
                    <label for="message">Message *</label>
                 </div>
                 <div class="col-md-7">
                    <textarea name="message" id="message" rows="3" width="100%" class="form-control" required></textarea>
                 </div>   
            </div>
            
            <div class="row form-group">
                 <div class="col-md-2 offset-md-3">
                    &nbsp;
                 </div>
                 <div class="col-md-7">                                
                        <div class="g-recaptcha" data-sitekey="6Lf6cmAUAAAAAMew3MznV1mnT8uoAeZYJYBDmjdu"></div>
                 </div>   
            </div>
            
            <div class="row form-group">
                 <div class="col-md-2 offset-md-3">
                    &nbsp;
                 </div>
                 <div class="col-md-7" id="submit-div">                                
                        <input type="submit" id="submit" value="Submit" class="btn btn-primary">                        
                 </div>   
            </div>
                
        </form>

    </div>
    </div>
@endsection