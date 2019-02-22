@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('link.Menu_mylinks') }}</div>
                
<a href="{{url('links/create')}}" role="button" class="btn btn-primary col-md-4">Add new link</a>
                
                <div class="card-body">
                    @if(!count($mylinks))
                    No links
                    @else

                    <table class="table table-bordered table-condensed table-striped">
                        <thead>
                            <tr><th>Designation</th>
                                <th>link</th><th></th></tr>
                        </thead>
                        <tbody>
                                @foreach($mylinks as $mylink)
                            <tr>
                                <td>{{$mylink->designation}}</td>
                                <td>{{$mylink->short_link}}</td>
                                <td><button type="button" class="btn btn-danger  btn-sm">Delete</button></td>
                            </tr>
                            @endforeach
                        </tbody>


                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection