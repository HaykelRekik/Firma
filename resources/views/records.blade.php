<html>
 <head>

 </head>
 <body>
 <h3>Imprimer le {{$now}}</h3>
 <h3 align="center">Données des capteur </h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr>
                <th style="border: 1px solid; padding:1px;" width="20%">Valeurs</th>
                <th style="border: 1px solid; padding:1px;" width="30%">Ajouter le</th>
            </tr>

            @foreach ($sensorData as $val) 
                <tr>
                    <td style="border: 1px solid; padding:1px;">{{  $val->value }}</td>
                    <td style="border: 1px solid; padding:1px;">{{  $val->created_at }}</td>
                    
                </tr>
                @endforeach
 </body>
</html>