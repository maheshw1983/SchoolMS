
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>  
<body>
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Students
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default" style="float:right">New Student</button>
                </div><!-- card-header -->
                

                <!-- new student bootstrp model -->
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><b>Add New Student</b></h4>
                            </div>

                            <div class="modal-body">
                                <form action="{{action('studentController@store')}}" method="POST" class="form-horizontal">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label class="control-label col-md-6">Full Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="name" class="form-control" placeholder="name">  
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Guardian Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="GuardianName" class="form-control" placeholder="Guardian Name"> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Permanet Address</label>
                                        <div class="col-md-10">
                                            <input type="text" name="PermanetAddress" class="form-control" placeholder="Permanet Address"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Current Address</label>
                                        <div class="col-md-10">
                                            <input type="text" name="CurrentAddress" class="form-control" placeholder="Current Address"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Gender</label>
                                        <div class="col-md-10">
                                            <input type="text" name="Gender" class="form-control" placeholder="Gender">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Province</label>
                                        <div class="col-md-10">
                                            <input type="text" name="Province" class="form-control" placeholder="Province">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Grade</label>
                                        <div class="col-md-10">
                                            <input type="text" name="Grade" class="form-control" placeholder="Grade">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Birth Day</label>
                                        <div class="col-md-10">
                                             <input type="text" name="BirthDay" class="form-control" placeholder="Birth Day"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Mobile Number</label>
                                        <div class="col-md-10">
                                             <input type="text" name="MobileNumber" class="form-control" placeholder="Mobile Number"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">E-mail</label>
                                        <div class="col-md-10">
                                             <input type="email" name="email" class="form-control" placeholder="E-mail Address"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Password</label>
                                        <div class="col-md-10">
                                             <input type="password" name="password" class="form-control" placeholder="Password"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <button type="submit" class="btn btn-success">Add Student</button>
                                            &nbsp;
                                            <button type="reset" class="btn btn-warning">Reset</button>
                                        </div>
                                    </div>
                                </form> 
                            </div><!-- modal-body -->
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->  
                </div><!-- /.modal -->
                <!-- new student bootstrp model end -->



                <!-- update student bootstrp model -->
                 <div class="modal fade" id="modal-update">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><b>update Student</b></h4>
                            </div>

                            <div class="modal-body">
                                <form action="/update" method="POST" class="form-horizontal">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label class="control-label col-md-6">Full Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="name" value="" class="form-control" placeholder="name">  
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Guardian Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="GuardianName" class="form-control" placeholder="Guardian Name"> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Permanet Address</label>
                                        <div class="col-md-10">
                                            <input type="text" name="PermanetAddress" class="form-control" placeholder="Permanet Address"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Current Address</label>
                                        <div class="col-md-10">
                                            <input type="text" name="CurrentAddress" class="form-control" placeholder="Current Address"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Gender</label>
                                        <div class="col-md-10">
                                            <input type="text" name="Gender" class="form-control" placeholder="Gender">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Province</label>
                                        <div class="col-md-10">
                                            <input type="text" name="Province" class="form-control" placeholder="Province">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Grade</label>
                                        <div class="col-md-10">
                                            <input type="text" name="Grade" class="form-control" placeholder="Grade">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Birth Day</label>
                                        <div class="col-md-10">
                                             <input type="text" name="BirthDay" class="form-control" placeholder="Birth Day"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Mobile Number</label>
                                        <div class="col-md-10">
                                             <input type="text" name="MobileNumber" class="form-control" placeholder="Mobile Number"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">E-mail</label>
                                        <div class="col-md-10">
                                             <input type="email" name="email" class="form-control" placeholder="E-mail Address"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-6" for="email">Password</label>
                                        <div class="col-md-10">
                                             <input type="password" name="password" class="form-control" placeholder="Password"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <button type="submit" class="btn btn-success">Update Student</button>
                                        </div>
                                    </div>
                                </form> 
                            </div><!-- modal-body -->
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->  
                </div><!-- /.modal -->
                <!-- update student bootstrp model end -->

             <!-- Modal -->
<div class="modal fade" id="delete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ action('studentController@destroy') }}" method="POST">
        {{method_field('delete')}}
        {{csrf_field()}}
        <div class="modal-body">
            <p class="text-center">
                Are You sure you want to delete this?
                <br><br>
                <input type="hidden" name="category_id" id="cat_id" value="">
                <button type="submit" class="btn btn-success btn-lg">Yes</button>
                <button type="button" class="btn btn-danger btn-lg"  data-dismiss="modal">No</button>
            </p>
        </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
 
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone Number</th>
                                    <th>Grade</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            
                            <tbody>
                            @foreach ($student as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->studentName}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->mobileNumber}}</td>
                                    <td>{{$student->Grade}}</td>
                                    <td>
                                        <a href="{{url('/stdTable/edit/'.$student->id)}}" data-toggle="modal" data-target="#modal-update" class="btn btn-primary">Edit</a>&nbsp;
                                        <button class="btn btn-danger"  data-catid="{{$student->id}}" data-toggle="modal" data-target="#delete">Delete</button>
                                        
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
<script>
  $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var cat_id = button.data('catid') 
      var modal = $(this)
      modal.find('.modal-body #cat_id').val(cat_id);
})
</script>
</body>
</html>

