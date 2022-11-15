@extends('layouts.admin')

@section('title', 'Equipment')

@section('heading')
    {{ __('Equipment') }}
@endsection

@section('description')
    {{ __('List Equipment') }}
@endsection

@section('navlink')
    {{--<li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>--}}
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Equipment</li>
@endsection

@section('content')
    <div class="page-content">
        <section class="section">
            <div class="card">
                @if(Auth::user()->can('ACP-equipment-create'))
                <a href="{{ route('acp.equipment.create') }}" class="btn btn-primary">{{ __('Create new equipment') }}</a>
                @else
                    <button class="btn btn-primary" disabled>{{ __('Create new equipment') }}</button>
                @endif
                <div class="card-header">
                    Simple Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Operation</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($equipment as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        @if(Auth::user()->can('ACP-equipment-edit'))
                                        <a href="{{ route('acp.equipment.edit', $item->id) }}" type="button" class="btn btn-outline-info">Edit</a>
                                        @else
                                            <button class="btn btn-outline-info" disabled>Edit</button>
                                        @endif
                                        @if(Auth::user()->can('ACP-equipment-edit') && Auth::user()->can('ACP-equipment-delete'))
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#danger{{ $item->id }}">Delete</button>
                                            @else
                                        <button class="btn btn-outline-danger" disabled>Delete</button>
                                            @endif
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade text-left" id="danger{{ $item->id }}" tabindex="-1"
                                 role="dialog" aria-labelledby="myModalLabel120"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                     role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title white" id="myModalLabel120">
                                                {{ __('Delete equipment') }}
                                            </h5>
                                            <button type="button" class="close"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <form method="post" action="{{ route('acp.equipment.delete', $item->id) }}">
                                            @method('patch')
                                            @csrf
                                            <div class="modal-body">
                                                {{ __('Equipment') }} <b>{{$item->name}}</b> {{ __('will be deleted and cannot be restored.') }}

                                                <hr>
                                                <div class="form-group row">
                                                    <label for="IsActive{{$item->id}}" class="col-md-11 col-form-label">Confim delete equipment</label>
                                                    <div class="form-check col-md-1">
                                                        <input class="form-check-input" type="checkbox" value="true" id="IsActive{{$item->id}}" name="IsActive{{$item->id}}">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">{{ __('Cancle') }}</span>
                                                </button>
                                                <button type="submit" class="btn btn-danger ml-1" id="deleteActive{{$item->id}}">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">{{ __('Delete') }}</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

@endsection

@section('scripts')
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
        @foreach($equipment as $item)
            $('#deleteActive{{$item->id}}').prop("disabled", true);
            $('#IsActive{{$item->id}}').on("change",function(){
                if($('#IsActive{{$item->id}}:checked').length>0)
                    $('#deleteActive{{$item->id}}').prop("disabled",false);
                else
                    $('#deleteActive{{$item->id}}').prop("disabled",true);
            });
        @endforeach
    </script>
@endsection
