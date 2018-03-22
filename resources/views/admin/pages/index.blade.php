

@extends('layouts.app')

    @extends('admin.header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
               
                    <div class="panel-heading">Pages for <b>{{ $portfolio->name }}</b></div>

                    <div class="panel-body">
                    <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{ route('portfolios.index') }}">
                    <i class="fa fa-backward" aria-hidden="true"></i> back
                    </a>
                       |{{ link_to_route('admin', 'admin', null, ['class' => 'btn btn-info btn-xs']) }}
                       {{ link_to_route('pages.create', 'create', [$portfolio->id], ['class' => 'btn btn-info btn-xs']) }}

                        <hr>
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                            
                                <th width="5%">id</th>
                                <th width="10%">Name</th>
                                <th width="5%">Alias</th>

                                <th width="35%">Text</th>
                                <th width="5%">Images</th>

                                <th width="20%">Actions</th>

                                <td width="5%">Link</td>
                                <td width="5%">Img2</td>
                                <td width="5%">Price</td>
                            </tr>
                            <tr>
                            
                                <td colspan="9" class="light-green-background no-padding" title="Create new template">
                                    <div class="row centered-child">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        
                        
                        @foreach ($portfolio->pages as $page)
                            <tr>
                             
                                <td>{{$page->id}}</td>
                                <td>{{$page->name}}</td>
                                <td>{{$page->alias}}</td>
                                <td>{{$page->text}}</td> 
                                <td>{{$page->images}}</td>

                                
                                
                                
                                <!--??????????????????????????_templates-->
                                <td>
                                
                                    
                                {{Form::open(['route' => array_merge(['pages.destroy'], compact('portfolio', 'page')), 'class' => 'confirm-delete','method' => 'DELETE'])}}
                                {{-- link_to_route('pages.show', 'info', ['portfolio' => $portfolio, 'page' => $page], ['class' => 'btn btn-success btn-xs']) --}}
                                {{ link_to_route('portfolioAlls.index', 'PORTFOLIO', ['portfolio' => $portfolio,$page->id], ['class' => 'btn btn-success btn-xs']) }}
                                {{ link_to_route('peopleAlls.index', 'PEOPLE', ['portfolio' => $portfolio,$page->id], ['class' => 'btn btn-success btn-xs']) }}
                                {{ link_to_route('socialAlls.index', 'SOCIALS', ['portfolio' => $portfolio,$page->id], ['class' => 'btn btn-success btn-xs']) }}

                                
                                {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                    {{Form::close()}}
                                </td>

                                <td>{{$page->link}}</td>
                                <td>{{$page->videos}}</td>
                                <td>{{$page->audios}}</td>

                            </tr>
                        @endforeach
                        

                        <div class="text-center">




                        </div>
                   
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
