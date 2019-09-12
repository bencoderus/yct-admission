function uvalidate(str)
{
    if(str.length == 0)
    {
        document.getElementById("uv").innerHTML="Username is empty!";
    }
    else
    {
        var ben=new XMLHttpRequest();
        ben.onreadystatechange= function () {
            if(ben.readyState==4 && ben.status==200)
            {
                document.getElementById("uv").innerHTML=ben.responseText;
            }
        };
        ben.open("GET", "login.php?user=" +str, true);
        ben.send();
    }
}