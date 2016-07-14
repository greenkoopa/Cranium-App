@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$cardset->name}}</div>
                @if ($cardcolors->count() > 0)
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <td>Card Color</td>
                            <td>Card Type</td>
                            <td>Action</td>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($cardcolors as $color)
                              <tr>
                                <td rowspan={{$cardtype_count[$color->id]}}>
                                {{$color->color}} : {{$color->title}}<br>
                                <a href="/cardcolor/edit/{{$color->id}}">Edit</a><br>
                                <a href="/cardcolor/delete/{{$color->id}}" onclick="return confirm('Click OK to confirm deletion')">Delete</a>
                                </td>
                                @if ($cardtype_count[$color->id] == 1)
                                  <td>
                                    No card types currently in this color. Make One: <br>
                                    <a href="/cardtype/create/{{$color->id}}">
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa fa-btn fa-pencil-square-o"></i> Create Card Type
                                        </button>
                                    </a>
                                  </td>
                                  <td>
                                    None to take
                                  </td>
                                </tr>
                                @endif
                              @foreach ($cardtypes[$color->id] as $type)
                                @if ($type->color_id == $color->id)
                                  <td>{{$type->title}}</td>
                                  <td>
                                    <a href="/cardtype/edit/{{$type->id}}">
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa fa-btn fa-pencil-square-o"></i> Edit
                                        </button>
                                    </a>
                                    <a href="/cardtype/delete/{{$type->id}}" onclick="return confirm('Click OK to confirm deletion')">
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa fa-btn fa-trash"></i> Delete
                                        </button>
                                    </a>
                                  </td>
                                </tr>
                                @endif
                              @endforeach
                              <td>Create a new type for this color</td>
                              <td>
                                <a href="/cardtype/create/{{$type->id}}">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fa fa-btn fa-pencil-square-o"></i> Create
                                    </button>
                                </a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                    <span>
                      <a href="/cardcolor/create/{{$cardset->id}}">
                          <button type="button" class="btn btn-primary">
                              <i class="fa fa-btn fa-pencil-square-o"></i> Create New Color
                          </button>
                      </a>
                    </span>


                  </div>
                @else <!-- From above isset statement -->
                  <div class="panel-body">
                    There are no card colors in this set. <br><br>
                      <a href="/cardcolor/create/{{$cardset->id}}">
                          <button type="button" class="btn btn-primary">
                              <i class="fa fa-btn fa-pencil-square-o"></i> Create Card Color
                          </button>
                      </a>
                  </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
