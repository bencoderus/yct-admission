//surname
function v1(str)
{
var count=str.length;
if(count < 4)
{
    document.getElementById("f1").className="form-control is-invalid";
    document.getElementById("v1").className="invalid-feedback";
    document.getElementById("v1").innerHTML="Surname is too short!";
}
else
{
    document.getElementById("f1").className="form-control is-valid";
    document.getElementById("v1").className="valid-feedback";
    document.getElementById("v1").innerHTML="Surname is valid!";
}
}

//names

function v2(str)
{
    var count=str.length;
    
if(count < 4)
{
    document.getElementById("f2").className="form-control is-invalid";
    document.getElementById("v2").className="invalid-feedback";
    document.getElementById("v2").innerHTML="Name is too short!";
}
else
{
    document.getElementById("f2").className="form-control is-valid";
    document.getElementById("v2").className="valid-feedback";
    document.getElementById("v2").innerHTML="Name is valid!";
}
}

//sex

function v3(str)
{
    var count=str.length;
    
if(count < 4)
{
    document.getElementById("f3").className="form-control is-invalid";
    document.getElementById("v3").className="invalid-feedback";
    document.getElementById("v3").innerHTML="Sex has not been selected";
}
else
{
    document.getElementById("f3").className="form-control is-valid";
    document.getElementById("v3").className="valid-feedback";
    document.getElementById("v3").innerHTML="Sex is valid!";
}
}
//dob

function v4(str)
{
    var count=str.length;
    document.getElementById("f4").className="form-control is-valid";
    document.getElementById("v4").className="valid-feedback";
    document.getElementById("v4").innerHTML="Date of birth is valid!";
}
//country

function v5(str)
{
    var count=str.length;
       
if(count < 4)
{
    document.getElementById("f5").className="form-control is-invalid";
    document.getElementById("v5").className="invalid-feedback";
    document.getElementById("v5").innerHTML="Country has not been selected";
}
else
{
    document.getElementById("f5").className="form-control is-valid";
    document.getElementById("v5").className="valid-feedback";
    document.getElementById("v5").innerHTML="Country is valid!";
}
}
//address

function v6(str)
{
    var count=str.length;
       
if(count < 12)
{
    document.getElementById("f6").className="form-control is-invalid";
    document.getElementById("v6").className="invalid-feedback";
    document.getElementById("v6").innerHTML="Address is too short";
}
else
{
    document.getElementById("f6").className="form-control is-valid";
    document.getElementById("v6").className="valid-feedback";
    document.getElementById("v6").innerHTML="Address seems valid!";
}
}