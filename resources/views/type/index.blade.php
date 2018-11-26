@extends('layouts.admin-template')

@section('content-header')
    <h4>Leave Types</h4>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="/type/create" style="cursor: pointer;"><i class="fa fa-plus"></i> Add New</a>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Minimum Years of Service</th>
                    <th>Initial Number of Days</th>
                    <th>Maximum Number of Days</th>
                    <th>Is for Male</th>
                    <th>Is for Female</th>
                    <th>Is Convertible to Cash</th>
                    <th>Are Docs Required</th>
                    <th>Can be Carried Over</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                @if(count($types) > 0)
                    <tbody>
                    @foreach($types as $type)
                        <tr>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->description }}</td>
                            <td>{{ $type->min_years_service }}</td>
                            <td>{{ $type->num_days }}</td>
                            <td>{{ $type->max_days }}</td>
                            @if($type->for_male == 1)
                                <td>Yes</td>
                            @elseif($type->for_male == 0)
                                <td>No</td>
                            @endif
                            @if($type->for_female == 1)
                                <td>Yes</td>
                            @elseif($type->for_female == 0)
                                <td>No</td>
                            @endif
                            @if($type->convert_to_cash == 1)
                                <td>Yes</td>
                            @elseif($type->convert_to_cash == 0)
                                <td>No</td>
                            @endif
                            @if($type->require_docs == 1)
                                <td>Yes</td>
                            @elseif($type->require_docs == 0)
                                <td>No</td>
                            @endif
                            @if($type->carry_over == 1)
                                <td>Yes</td>
                            @elseif($type->carry_over == 0)
                                <td>No</td>
                            @endif
                            <td><a href="{{ url('/type/'.$type->id.'/edit') }}" style="cursor: pointer;"><i class="fa fa-edit"></i></a></td>
                            <td>
                                <form action="{{ url('type/'.$type->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button style="color:#dd4b39;background: none;padding:0;margin:0;" class="btn btn-sm"><i class="fa fa-remove"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @else
                    <tbody>
                        <tr>
                            <td>No records found.</td>
                        </tr>
                    </tbody>
                @endif
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection