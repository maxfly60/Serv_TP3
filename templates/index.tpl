<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/vader/jquery-ui.css">
        <title>{$title}</title>
    </head>

    <body>
        <h1>Exercice 1</h1>
        <div id="username">
            <label>Username</label>
            <input type="text" placeholder ="Username"/>
            <span>Merci d'entrer un username.</span>
        </div>
        <h1>Exercice 2</h1>
        <div id="style">
            <label>Style :</label>
            <input type="text" placeholder ="Style"/>
        </div>
    </body>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script>

        $( function vérification() {
            console.info("jQuery chargé ")
            console.info($('#username input').blur(vUsername).keyup(vUsername))
    //        console.info($('#style input').blur(vStyle).keyup(vStyle))
        })

        function vUsername()
        {
            if($('#username input').val().trim()===''){
                $('#username span').show()
                return false
            }else{
                $.getJSON("../username/test/" + $('#username input').val().trim(), function(doexist) {
                 console.log(doexist);   
                })
                $('#username span').hide()

            }
            
    
        }

    </script>


</html>