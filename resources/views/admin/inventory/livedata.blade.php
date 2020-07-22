
<thead>
    <tr>
        <th>S.No</th>
        <th>Dropshipper</th>
        <th>FTP Folder</th>
        <th>Today Update Count</th>
        <th>Started At</th>
        <th>Total</th> 
    </tr>
</thead>  
<tbody id="livereportTableBody">
    <?php $i=1; ?>
    @forelse(@$liveData['dropshippers'] as $dropshipper => $count) 
    <tr> 
        <td>{{@$i++}}</td>
        <td>{{@$dropshipper}}</td>
        <td>{{getFTPfolders(@$dropshipper)}}</td>
        <td>{{@$liveData['today_dropshippers'][$dropshipper]??0}}</td>
        <td>{{@$liveData['time_dropshippers'][$dropshipper]??'-'}}</td>
        <td>{{@$count}}</td>  
    </tr>
    @empty 
    @endforelse
     
    <tr> 
        <td colspan="5">Total</td> 
        <td>{{@$liveData['total']}}</td>  
    </tr> 

</tbody>
