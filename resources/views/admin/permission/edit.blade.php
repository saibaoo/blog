@extends('admin.layouts.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Permissons</h3>
            </div>
              @include('includes.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('permission.update',$permission->id)}}" method="POST">
              {{csrf_field()}}
              {{method_field('PUT')}}
              <div class="box-body">
                <div class="col-lg-offset-3 col-lg-6">
                  <div class="form-group">
                  <label for="name">Permission Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{$permission->name}}" placeholder="Permission name">
                </div>

                <div class="form-group">
                  <label for="for">Permission For</label>
                  <select class="form-control" name="for" id="for">
                    <option selected="true"  disabled>Select Permissions For</option>
                    <option value="user">User</option>
                    <option value="post">Post</option>
                    <option value="other">Other</option>
                    
                  </select>
                </div>


              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a type="button" href="{{route('permission.index')}}" class="btn btn-warning">Back</a>
              </div>
                </div>


              
            </form>
          </div>
          <!-- /.box -->

          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection