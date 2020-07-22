<?php $i=1; ?>
@forelse(@$liveData['dropshippers'] as $dropshipper => $count) 
<tr> 
    <td>{{@$i++}}</td>
    <td>{{@$dropshipper}}</td>
    <td>{{getFTPfolders(@$dropshipper)}}</td>
    <td>{{@$liveData['today_dropshippers'][$dropshipper]??0}}</td>
    <td>{{@$count}}</td>  
</tr> 
@empty 
@endforelse