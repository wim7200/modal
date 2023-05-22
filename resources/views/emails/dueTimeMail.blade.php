<!DOCTYPE html>
<html>
<head>
    <title>Yes, it is time to take action!</title>
</head>
<body>
<p>Hey {{$user->name}} ,</p>
<p>Deze email is een reminder. </p>
<p>Volgende toestellen moeten in nabije toekomst gecalibreerd worden.</p>
<p>Graag actie ondernemen!</p>
<p>
    Met dank,<br/>
    De Lactam-Shop,
    (uit dueTimeMail)
</p>

toestellen te calibreren :<br/>

@foreach($tools as $tool)
    - {{$tool->name}} calibratie ten laatste op : {{\Carbon\Carbon::parse($tool->duetime)->format('Y-M-d')}}
    ==> {{$tool->qrTool}}<br/>
@endforeach


</body>
</html>
