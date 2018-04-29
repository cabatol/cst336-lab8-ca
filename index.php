<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AJAX: Sign Up Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="custom.css">
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script>
        
            function validateForm() {
                
                return false;
           
            }
            
        </script>
        
        
        <script>
        //Counties: http://itcdland.csumb.edu/~milara/ajax/countyList.php?
            //document ready event is ignored till the whole page loads
            $(document).ready(function(){
                
                $("#userName").change(function() {
                     //alert(  $("#username").val() );
                    $.ajax({

                        type: "GET",
                        url: "checkUsername.php",
                        dataType: "json",
                        data: { "username": $("#userName").val() },
                        success: function(data,status) {
                            
                            if (!data) {  //data == false
                                
                                $("#isTaken").html("<h4> Username is AVAILABLE</h4>");
                                $("#isTaken").css("color","lightgreen");

                                
                            } else {
                                
                                $("#isTaken").html("<h4> Username is TAKEN!</h4>");
                                $("#isTaken").css("color","red");
                                
                            }
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                        
                    });//ajax
                })
                
                  $("#state").change(function() {
                      $.ajax({
                    
                        type: "GET",
                        url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php?",
                        dataType: "json",
                        data: { "state": $("#state").val()},
                        success: function(data,status) {
                            //alert(data[0].county)
                            $("#county").html("<option>- Select One -</option>")

                           for (var i =0; i < data.length;i++) {
                                $("#county").append("<option>" + data[i].county + "</option>")
                           }
                            
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                    
                    });//ajax
                  })
                
                $("#zipCode").change(function(){
                    //alert($("#zipCode").val()
                    $.ajax({
                    
                        type: "GET",
                        url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php?",
                        dataType: "json",
                        data: { "zip": $("#zipCode").val()},
                        success: function(data,status) {
                            
                            if(!data){
                                $("#zipNotFound").html("<h4> Zipcode was not found.</h4>")
                                $("#zipNotFound").css("color","red");
                            }
                            else{
                                //alert(data.city);
                                $("#city").html("City: " + data.city)
                                $("#lati").html("Latitude: " + data.latitude)
                                $("#long").html("Longitude: " + data.longitude)
                            }
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                    
                    });//ajax
                    
                })
                
                $("#submit").click(( function() {
                    if($("#checkpw").val() != $("#mypw").val()){
                        $("#pwIsTaken").html("<h4> Password must match.</h4>");
                        $("#pwIsTaken").css("color","red");
                    }
                }))
            })
            
        </script>

    </head>

    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
        <h1 style="color:#ff5722"> Sign Up Form </h1>
        <div class="content">
        <form onsubmit="return validateForm()" id="myForm">
            <fieldset>
                <input type="text" class="inBox" placeholder="First Name"><br> 
                <input type="text" class="inBox" placeholder="Last Name"><br> 
                <input type="text" class="inBox" placeholder="Email"><br> 
                <input type="text" class="inBox" placeholder="Phone Number"><br>
                <input type="text" class="inBox" id = "zipCode" placeholder="Zipcode" placeholder="Zip Code"><span id="zipNotFound"></span><br>
                <span id ="city"></span>
                <br>
                <span id = "lati"></span>
                <br>
                <span id = "long"></span>
                <br><br>
                 
                <select id = "state" class="inBox" placeholder="State">
                    <option value=""> State </option>
                    <option value="ca"> California</option>
                    <option value="ny"> New York</option>
                    <option value="tx"> Texas</option>
                    <option value="va"> Virginia</option>
                </select><br />
                
                <select id = "county" class="inBox" placeholder="Select a Country"></select><br>
                <input type="text" id = "userName" class="inBox" placeholder="Desired Username"><span id="isTaken"></span><br>
                <input type="password" id="mypw" class="inBox" placeholder="Password"><br>
                <input type="password" id="checkpw" class="inBox" placeholder="Type Password Again"><span id="pwIsTaken"></span><br>
                
                <input type="submit" value="Sign up!" id="submit"><br/></br>
            </fieldset>
        </form>
    </div>
    </body>
</html>