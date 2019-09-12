
    function vphone(str)
  {
          var ben=new XMLHttpRequest();
          ben.onreadystatechange= function () {
              if(ben.readyState==4 && ben.status==200)
              {var status=ben.responseText;

                if(status=="success")
                {
                document.getElementById("infophone").className="valid-feedback";
                document.getElementById("infophone").innerHTML="Mobile number has been validated!";
                document.getElementById("vmobile").className="form-control is-valid";                    
            }

            else if(status=="e1")
                {
                document.getElementById("infophone").innerHTML="Mobile number already existing!";
                document.getElementById("infophone").className="invalid-feedback";   
                document.getElementById("vmobile").className="form-control is-invalid";    
                   }
                   else if(status=="e2")
                   {
                   document.getElementById("infophone").innerHTML="Mobile number is too short!";
                   document.getElementById("infophone").className="invalid-feedback";   
                   document.getElementById("vmobile").className="form-control is-invalid";    
                      }
                      else if(status=="e3")
                      {
                      document.getElementById("infophone").innerHTML="Mobile number is not valid";
                      document.getElementById("infophone").className="invalid-feedback";   
                      document.getElementById("vmobile").className="form-control is-invalid";    
                         }
                         else
                         {

                         }
                        
              }
          };
          ben.open("GET", "ajax/reg.php?mobile=" +str, true);
          ben.send();
      }
      function vemail(str)
      {
              var ben=new XMLHttpRequest();
              ben.onreadystatechange= function () {
                  if(ben.readyState==4 && ben.status==200)
                  { var status=ben.responseText;

                    if(status=="success")
                    {
                    document.getElementById("infomail").className="valid-feedback";
                    document.getElementById("infomail").innerHTML="Your email has been validated!";
                    document.getElementById("vmail").className="form-control is-valid";                    }
                    else
                    {
                    document.getElementById("infomail").innerHTML="Your email already exist!";
                    document.getElementById("infomail").className="invalid-feedback";   
                    document.getElementById("vmail").className="form-control is-invalid";    
                       }
                           }
              };
              ben.open("GET", "ajax/reg.php?email=" +str, true);
              ben.send();
          }
    
      function vpass(str)
      {
        var len=str.length;
           if(len > 5)
        {            document.getElementById("infopass").className="valid-feedback";
                    document.getElementById("infopass").innerHTML="Password seems ok!";
                    document.getElementById("pass1").className="form-control is-valid"; 
                 }
        else
        {   
            document.getElementById("infopass").innerHTML="Password is too short!";
        document.getElementById("infopass").className="invalid-feedback";   
        document.getElementById("pass1").className="form-control is-invalid";    
           
    }
      }
  
      
      function matchpass()
      {
  var a, b;
  a=document.getElementById("pass1").value;
  b=document.getElementById("pass2").value;
        
  var good=" <span class='text-success'>Password confirmed!</span> ";
  var bad=" <span class='text-danger'>Password doesnt match</span>";
        if(a.length > 0 && b.length> 0)
        {
        if(a === b)
        {
            document.getElementById("matchpass").className="valid-feedback";
            document.getElementById("matchpass").innerHTML="Password has been confirmed!";
            document.getElementById("pass2").className="form-control is-valid"; 
            }
        else
        {
            document.getElementById("matchpass").className="invalid-feedback";
            document.getElementById("matchpass").innerHTML="Password doesnt match!";
            document.getElementById("pass2").className="form-control is-invalid"; 
         }
        }
  }