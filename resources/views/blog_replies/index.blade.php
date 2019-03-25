@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          BlogReply
          <a class="btn btn-success float-xs-right" href="{{ route('blog_replies.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($blog_replies->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Topic_id</th> <th>User_id</th> <th>Content</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($blog_replies as $blog_reply)
              <tr>
                <td class="text-xs-center"><strong>{{$blog_reply->id}}</strong></td>

                <td>{{$blog_reply->topic_id}}</td> <td>{{$blog_reply->user_id}}</td> <td>{{$blog_reply->content}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('blog_replies.show', $blog_reply->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('blog_replies.edit', $blog_reply->id) }}">
                    E
                  </a>

                  <form action="{{ route('blog_replies.destroy', $blog_reply->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $blog_replies->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
