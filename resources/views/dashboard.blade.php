@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row well">
   	@include('inc.message')
  	<div class="col-sm-6">
  		{!! Form::open(array('url' => 'dashboard/submit/valid', 'method' => 'POST')) !!}
            <div class="form-group">
                {!! Form::label('code', 'Voeg een geldige code toe:') !!}
                {!! Form::text('code', '', ['class' => 'form-control', 'placeholder' => 'Enter your code']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
  	</div>
  	<div class="col-sm-6">
  		{!! Form::open(array('url' => 'dashboard/submit/winning', 'method' => 'POST')) !!}
            <div class="form-group">
                {!! Form::label('code', 'Voeg een winnen de code toe:') !!}
                {!! Form::text('code', '', ['class' => 'form-control', 'placeholder' => 'Enter your code']) !!}
            </div>
            <div class="form-group">
                {!! Form::select('land', ['Mexico' => 'Mexico', 'Chile' => 'Chile', 'Italy' => 'Italy', 'Maldives' => 'Maldives', 'Australia' => 'Australia'], 'Mexico') !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
  	</div>
  </div>
  <div class="row">
    <div class="col-sm-12 adminTable">
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Codes</th>
            <th>Role</th>
            <th>Edit/Remove</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Email</th>
            <th>Codes</th>
            <th>Role</th>
            <th>Edit/Remove</th>
          </tr>
        </tfoot>
        <tbody>
            @if(count($users) > 0)
                @foreach($users->all() as $user )
                  <tr>
					      <td>{{$user->id}}</td>
		            <td>{{$user->name}}</td>
		            <td>{{$user->email}}</td>
		            <td>
                @foreach($user->codes as $code )
                  {{$code->code}},
                @endforeach
                </td>
		            @if($user->admin1_user0 == 0)
		            	<td>User</td>
		            @else
		            	<td>Admin</td>
		            @endif
    		     		<td>
                  @if($user->deleted_at != NULL)
                    <a href="/dashboard/restore/{{$user->id}}">Kwalificeren</a>
                  @else
                    <a href="/dashboard/delete/{{$user->id}}">Diskwalificeren</a>
                  @endif
    		     		</td>
		          </tr>
                @endforeach
            @endif
        </tbody>
      </table>
    </div> 
  </div>     
</div>
@endsection
