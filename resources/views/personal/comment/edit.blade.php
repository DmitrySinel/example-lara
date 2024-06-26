@extends('personal.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Комментарии</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('personal.comment.index') }}">Комментарии</a></li>
                <li class="breadcrumb-item active">{{ $comment->id }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST" class="w-50">
                          @csrf
                          @method('PATCH')
                          <div class="form-group">
                            <textarea class="form-control" name="message" cols="30" rows="10">{{ $comment->message }}</textarea>
                            @error('message')
                              <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                          </div>
                          <input type="submit" class="btn btn-primary" value="Обновить">
                        </form>
                      </div>
                    <!-- /.card -->
            </div>
        </div>
          <!-- ./col -->
        <!-- /.row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
