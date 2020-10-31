
    <footer>
      <p>
        Copyright © SoapCal.ca 2018
      </p>
    </footer>
        
    <script type="text/javascript">
    
        $(document).ready(function() {
            
            $('#saveSelectedOil').click(function() {
            
                //retrieve data
                var chooseOil = document.getElementById("oilPicker");
                
                //set up output string
                var result = "<ul>";                
                
                //set up selectedOil array
                var selectedOil = new Array();
        
                
                //step through options
                for (i = 0; i < chooseOil.length; i++){
                
                    //examine current option
                    currentOption = chooseOil[i];
                     
                    //print it if it has been selected
                    if (currentOption.selected == true){
                    
                        selectedOil.push(currentOption.value);
                        
                        result += "<li><div class='row form-group'><div class='col-sm-3'>"
                                + currentOption.value
                                + "</div><div class='col-sm-9'>"
                                + " <input type='text' id='oil-"
                                + [i]
                                + "' name='oil-"
                                + [i]
                                + "' class='form-control'> g</div></div>"
                                + "</li>";
                    } // end if
                } // end for loop               
                
                
                //finish off the list and print it out
                result += "</ul>";
                output = document.getElementById("output");
                output.innerHTML = result;
                
                //post selectedOil array to recipe.php file
                var elements = selectedOil.join(',');
                var tt = document.getElementById("selectedOil");
                tt.value = elements;                
            });            
            

            $('#changeName').click(function() {
                $('#newNameDiv').toggle();
            });
            
            $('#saveName').click(function() {
                $value = $('#newName').val();
                $('#recipeName').text($value);
                $('#newNameDiv').toggle();
            });
            
            $('#download').click(function() {
                var date = GetTodayDate();
                var filename = $('#recipeName').text() + ".txt";
                var text = "Recipe - " + $('#recipeName').text() + "\r\n\r\n";
                
                text += "Total oil weight : " + $('#totalOilWeight').text() + "\r\n";   
                for (i=0; i<$('ul#selectedOil li').length; i++)
                {
                    var j=i+1;
                    text += $('ul#selectedOil li:nth-child('+j+')').text() + " ";
                    text += $('ul#oilWeight li:nth-child('+j+')').text() + "\r\n";                    
                }
                
                text += "\r\n" + "NaOH : " + $('#totalNaoh').text() + "\r\n";
                text += "water : " +  $('#water').text() + "\r\n\r\n";
                
                text += "Soap weight : " +  $('#soapWeight').text() + "\r\n";
                text += "INS value : " +  $('#ins').text() + "\r\n\r\n";
                
                text += "Date : " + date;
                
                createDownload(filename, text);
            });
            
            function createDownload(filename, text) {
                var element = document.createElement('a');
                element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
                element.setAttribute('download', filename);
              
                element.style.display = 'none';
                document.body.appendChild(element);
              
                element.click();
              
                document.body.removeChild(element);
              }
              
            function GetTodayDate() {
                var tdate = new Date();
                var dd = tdate.getDate(); //yields day
                if(dd < 10)
                { dd = '0' + dd } 
                
                var mm = tdate.getMonth() + 1; //yields month
                if(mm < 10)
                { mm = '0' + mm }
                
                var yyyy = tdate.getFullYear(); //yields year
                var currentDate= yyyy + "-" + mm + "-" + dd;
             
                return currentDate;
            }
             
        });        
    </script>