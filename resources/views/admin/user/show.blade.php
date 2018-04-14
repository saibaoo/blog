@extends('admin.layouts.app')

@section('headSection')

<link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('main-content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.layouts.pageHead')

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Admin</h3>
          @can('users.create',Auth::user())
          <a class="col-lg-offset-5 btn btn-success" href="{{route('user.create')}}">Add New</a>
          @endcan
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="box">
              <div class="box-header">
                @include('includes.messages')
              </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Admin Name</th>
                  <th>Assigned Roles</th>
                  <th>Status</th>
                  @can('users.update',Auth::user())
                  <th>Edit</th>
                  @endcan

                  @can('users.delete', Auth::user())
                  <th>Delete</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$user->name}}</td>
                  <td>
                    @foreach($user->roles as $role)
                      {{$role->name}},
                    @endforeach
                  </td>
                  <td>{{$user->status? 'Active':'Not Active'}}</td>
                   @can('users.update',Auth::user())
                  <td><a href="{{route('user.edit',$user->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                   @endcan

                  @can('users.delete', Auth::user())
                  <td>
                          <form id="delete-form-{{$user->id}}" action="{{route('user.destroy',$user->id)}}" method="POST" style="display: none;">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                          </form>
                            <a href="" onclick="
                            if(confirm('Are you sure, You Want to delete this?'))
                              {
                                event.preventDefault();
                                document.getElementById('delete-form-{{$user->id}}').submit();
                              }else
                              {
                                event.preventDefault();
                              }
                              "><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                    @endcan
                </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Tag Name</th>
                  <th>Assigned Roles</th>
                   <th>Status</th>
                  @can('users.update',Auth::user())
                  <th>Edit</th>
                  @endcan

                  @can('users.delete', Auth::user())
                  <th>Delete</th>
                  @endcan
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection

  @section('footerSection')
  <!-- DataTables -->
<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
@endsection