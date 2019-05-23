@extends('template')
@section('title', 'Messages')

@section('content')
  {{--@include('__includes/nav_messages')--}}
  <div class="container">

    <a href="{{route('messages.create')}}" class="btn btn-primary">Submit a message</a>

    <div class="jumbotron">
      <h1>
        @if (Auth::check() && ((Auth::user()->hasRole('ROLE_ADMIN')) && Route::current()->getName() == 'usermessages')   )
          Everyones Messages:
        @else
          {{ Auth::user()->name }}'s Messages:
        @endif
      </h1>

      @if(count($messages)  > 0)
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th>Title</th>
              <th>Content</th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </thead>
          @foreach($messages as $message)
            <tr>
              <td>{{ $message->title }}</td>
              <td>{{ substr($message->content,0,10) }} ...</td>
              <td><a href="{{route('messages.show',$message->id)}}" class="btn btn-info">View</a></td>
              <td>
                <a href="{{route('messages.edit',$message->id)}}" class="btn btn-warning">
                  @if (Auth::check() && ((Auth::user()->hasRole('ROLE_ADMIN')) ))
                    Reply
                    @else
                    Edit
                  @endif
                </a>
              </td>
{{--<td><a href="{{route('messagereplies.edit',$message->id)}}" class="btn btn-secondary">Reply</a></td>--}}
<td>
 <form action="{{ route('messages.destroy',$message->id) }}" method="POST">
   {{ csrf_field() }}
   @method('DELETE')
   <button type="submit" class="btn btn-danger">Delete</button>
 </form>
</td>
</tr>
@endforeach
</table>
@else
You do not have any messages yet!
@endif
</div>





</div>
@endsection