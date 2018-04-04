@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['action' => 'PatientController@store', 'method'=> 'POST'] )!!}

                            <div class="row">
                                  <div class="form-group col-md-2">
                                    {{Form::label('MedicareNO','MedicarNo')}}
                                  </div>
                                  <div class="form-group col-md-6">
                                    {{Form::text('MedicareNo','',['class' =>'form-control'])}}
                                  </div>
                            </div>
                            <div class="row">
                                  <div class="form-group col-md-2">
                                    {{Form::label('patientName','PatientName')}}
                                  </div>
                                  <div class="form-group col-md-6">
                                    {{Form::text('patientName','',['class' =>'form-control'])}}
                                  </div>
                            </div>
                            <div class="row">
                                  <div class="form-group col-md-2">
                                    {{Form::label('details','Details')}}
                                  </div>
                                  <div class="form-group col-md-6">
                                    {{Form::textarea('details','',['class' =>'form-control'])}}
                                  </div>
                            </div>
                            <div class="row">

                                  <div class="form-group col-md-2">
                                    {{Form::label('author','Author')}}
                                  </div>
                                  <div class="form-group col-md-6">
                                    {{Form::text('author',Auth::user()->name,['class' =>'form-control','readonly' => 'true'])}}
                                  </div>
                            </div>
                            <div class="row">
                                  <div class="form-group col-md-2">
                                  </div>
                                  <div class="form-group col-md-6">
                                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                                  </div>
                            </div>

                    {!! Form::close()!!}




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('body_script')

   <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
   <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

   <!-- include summernote css/js -->

   <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script type="text/javascript">
    $('#summernote').summernote();
</script>
@endsection
