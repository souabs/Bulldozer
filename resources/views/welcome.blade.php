@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('link.Welcome_title') }}</div>

                <div class="card-body">
                    <ul>        
                    @foreach($list_links as $list_link)
                    <li>
                        <a href="{{$list_link->short_link}}" target="_blank">
                            {{$list_link->designation}}
                        </a>
                    </li>
                    @endforeach
                </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
