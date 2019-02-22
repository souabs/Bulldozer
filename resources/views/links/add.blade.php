@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('link.Menu_mylinks') }}</div>

                <div class="card-body">
        <form action="{{ url('/links') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            


            <div class="form-group">
                <label for="designation" class="col-sm-3 control-label">Designation</label>
                <div class="col-sm-6">
                    <input type="text" name="designation" id="designation" class="form-control" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="original_link" class="col-sm-3 control-label">Lien</label>
                <div class="col-sm-6">
                    <input type="text" name="original_link" id="original_link" class="form-control" value="" required="required">
                </div>
            </div>
                                                            
            
            </div>
            
            <div class="col-sm-offset-3 col-sm-6">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-default" href="{{ url('/links') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection