@extends('layouts.app_admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="{{ route('category.index') }}"><i class="fa fa-arrow-circle-left fa-2x text-warning"></i></a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-ship"></i> category</a></li>
            <li><a href="#">Update category</a></li>
        </ol>
    </section>
    @if(isset($categorydata))

        <form class="form-horizontal" id="updatecategory_form" action="{{ route('category.update' ,$categorydata->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    @if( session('success') )
                        <div class="alert alert-success alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <b>Success ! </b>{{ session('success') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Whoops!</strong> There were some problems.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update New Category</h3>
            </div>
            <!-- /.box-header -->
            <?php
                //echo 'status'.$categorydata->pdf.'<pre>';
                // print_r($categorydata);
            ?>
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="seller" class="col-sm-4 control-label">Parent Category Name</label>
                            <div class="col-sm-8">
                                <select  name="parent" class="form-control">
                                    @if($categorydata->parent == 0)
                                        <option value="0">Parent</option>
                                    @else
                                        @foreach($parentlist as $cat)
                                        {{ $categorydata->parent }}
                                        <option value="{{ $cat->id }}" {{ ($cat->id) == $categorydata->parent  ? "selected" : "" }}> {{ $cat->category_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">category Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="category_name" value="{{ $categorydata->category_name }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-sm-4 control-label">Upload PDF</label>
                            <div class="col-sm-8">
                                <input type="file" name="pdf" value="{{ $categorydata->pdf }}" class="form-control">
                                <input type="hidden" name="hidden_pdf" value="{{ $categorydata->pdf }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_or_used" class="col-sm-4 control-label">Category Satus</label>
                            <div class="col-sm-8">
                                <select name="status" class="form-control">
                                    <option value="1" {{ ($categorydata->status == 1 )  ? "selected" : "" }}>Active</option>
                                    <option value="0" {{ ($categorydata->status == 0 ) ? "selected" : "" }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer col-sm-offset-4">
                             <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        <!-- <div class="form-group">
                            <label for="currency" class="col-sm-4 control-label">Currency</label>
                            <div class="col-sm-8">
                                <select name="currency" class="form-control" >
                                    <option value="EUR">EUR</option>
                                    <option value="GBP">GBP</option>
                                    <option value="USD">USD</option>
                                    <option value="AUD">AUD</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                        
                    </div>
            </form>
          </div>
                    <div class="nav-tabs-custom">
                        <div class="tab-content" style="min-height: 275px;">
                            <div class="active tab-pane" id="details">

                                
                            </div>
                           
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
    </form>

    @else
    <form class="form-horizontal" id="addcategory_form" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    @if( session('success') )
                        <div class="alert alert-success alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <b>Success ! </b>{{ session('success') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Whoops!</strong> There were some problems.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- <div>
                        <h3 style="margin: 0;">Add New category
                            <button type="button" onclick="document.getElementById('addcategory_form').submit()" class="btn btn-info pull-right">Submit</button>
                        </h3>
                    </div> -->
                    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Category</h3>
            </div>
            <!-- /.box-header -->
            <?php
                // echo '<pre>';
                // print_r($parentlist);
            ?>
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="seller" class="col-sm-4 control-label">Parent Category Name</label>
                            <div class="col-sm-8">
                                <select  name="parent" class="form-control">
                                    <option value="0">Parent</option>
                                    @foreach($parentlist as $cat)
                                    <option value="{{ $cat->id }}" {{ old('parent') == $cat->id  ? "selected" : "" }}> {{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">category Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="category_name" value="{{ old('category_name') }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-sm-4 control-label">Upload PDF</label>
                            <div class="col-sm-8">
                                <input type="file" name="pdf" value="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_or_used" class="col-sm-4 control-label">Category Satus</label>
                            <div class="col-sm-8">
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status') == 1  ? "selected" : "" }}>Active</option>
                                    <option value="0" {{ old('status') == 0  ? "selected" : "" }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer col-sm-offset-4">
                             <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        <!-- <div class="form-group">
                            <label for="currency" class="col-sm-4 control-label">Currency</label>
                            <div class="col-sm-8">
                                <select name="currency" class="form-control" >
                                    <option value="EUR">EUR</option>
                                    <option value="GBP">GBP</option>
                                    <option value="USD">USD</option>
                                    <option value="AUD">AUD</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                        
                    </div>
            </form>
          </div>
                    <div class="nav-tabs-custom">
                        <div class="tab-content" style="min-height: 275px;">
                            <div class="active tab-pane" id="details">

                                
                            </div>
                           
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
    </form>
    <!-- /.content -->
    @endif
</div>
@endsection
@section('custom_js')
<link rel="stylesheet" href="{{ asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<script src="{{ asset('public/admin/bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

@endsection