                              
@forelse(@$liveData['dropshippers'] as $count => $dropshipper) 
<tr>
    <td>{{@$i++}}</td>
    <td>{{@$dropshipper}}</td>
    <td>{{@$dropshipper}}</td>
    <td>{{@$count}}</td>  
</tr> 
@empty
<tr>
    <td colspan="5">No Dropshippers found</td>
</tr>
@endforelse