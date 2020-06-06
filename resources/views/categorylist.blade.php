@extends('layouts.app_admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-ship"></i> Category</a></li>
            <li><a href="#">Category listing</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @if(session('success'))
                <div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <b>Success ! </b>{{ session('success') }}
                </div>
                @endif
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-sm-12">
                            <table id="category_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>category ID</th>
                                        <th>Name</th>
                                        <th>file</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($categorylist as $c) 
                                    <tr>
                                        <td>{{ $c->id }}</td>
                                        <td>{{ $c->category_name }}</td>
                                        <td>{{ $c->pdf }}</td>
                                        <td>{!! ($c->status  == 1) ? "<span class='label label-success'>Active</span>" : "<span class='label label-danger' >Inactive</span>" !!}</td>
                                        
                                        <td>
                                            <form class="form-horizontal" method="post" action="{{ route('category.destroy', $c->id)}}">
                                                <a href="{{ route('category.edit',$c->id) }}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" onclick="return confirm('Are You Sure ?');" class="btn btn-danger btn-xs"><i class='fa fa-trash'></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection
@section('custom_js')
<script>
    $(document).ready(function () {
        $('#category_table').DataTable({
            order: [[0, 'asc']],
            "language": {
                "emptyTable": "You have not added any boat yet !!"
            }
        });
    });
</script>
@endsection