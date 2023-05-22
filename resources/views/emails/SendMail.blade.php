<!DOCTYPE html>
<html>
<head>
    <title>Yes, it is time to take action!</title>
</head>
<body>
<p>Hey,</p>
<p>Deze email wil even je aandacht trekken omdat volgende toestellen in de nabije toekomst een calibratie zouden moeten
    krijgen.</p>
<p>Graag actie ondernemen!</p>
<p>
    Met dank,<br/>
    De Lactam-Shop,
    (uit SendMail)
</p>

toestellen te calibreren :<br/>

@foreach($tools as $tool)
    - {{$tool->name}} calibratie ten laatste op : {{\Carbon\Carbon::parse($tool->duetime)->format('Y-M-d')}}
    ==> {{$tool->qrTool}}<br/>
@endforeach


</body>
</html>
