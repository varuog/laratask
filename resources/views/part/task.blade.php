<tr>
    <td><input type="checkbox"></td>
    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
    <!-- <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td> -->
    <td class="mailbox-subject"> 
        <a href="{{action('TaskController@show',['task' => $task->id])}}">{{$task->title}}</a>
    </td>
    <td class="mailbox-subject"> <span class="label label-{{$task->priorityClass}}">{{ ucfirst($task->priority)}}</span></td>
    <td class="mailbox-subject"> {{$task->dueDate}}</td>
    <td class="mailbox-subject"> <span class="label label-danger">Fail</label></td>
    <!--<td class="mailbox-attachment"></td>-->
    <td class="mailbox-date">{{ \Carbon\Carbon::parse($task->created_at)->diffForHumans()}}</td>
</tr>