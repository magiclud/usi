@extends('layouts/doctor')

@section('content')
 <h1>Peru BookStore</h1>
 <a href="{{url('/doctor/create')}}" class="btn btn-success">Create Doctor</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Id</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Phone</th>
         <th>Gender</th>
         <th>Birthday</th>
         <th>Email</th>
         <th>Room</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($doctors as $doctor)
         <tr>
             <td>{{ $doctor->id }}</td>
             <td>{{ $doctor->first_name }}</td>
             <td>{{ $doctor->last_name }}</td>
             <td>{{ $doctor->phone }}</td>
             <td>{{ $doctor->gender }}</td>
             <td>{{ $doctor->birthday }}</td>
             <td>{{ $doctor->email }}</td>
             <td>{{ $doctor->room }}</td>
             <td><img src="{{asset('img/'.$book->image.'.jpg')}}" height="35" width="30"></td>
             <td><a href="{{url('doctor',$book->id)}}" class="btn btn-primary">Read</a></td>
             <td><a href="{{route('doctor.edit',$book->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['books.destroy', $book->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
@endsection