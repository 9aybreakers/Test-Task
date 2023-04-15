@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
        </div>
    </div>
    <div class="row">
        <form role="form" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Назва</label>
                    <input type="text" name="title"
                           class="form-control @error('title') is-invalid @enderror" id="title"
                           placeholder="Назва">
                </div>

                <div class="form-group">
                    <label for="description">Цитата</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Цитата ..."></textarea>

                </div>


                <div class="form-group">
                    <label for="content">Текст</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="5" placeholder="Контент ..."></textarea>

                </div>

                <div class="form-group">
                    <label class="category_id"> Категорія </label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option >Вибір Категорії</option>
                        @foreach($categories as $k=>$v)

                            <option value="{{$k}}">{{$v}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Теги</label>
                    <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Вибір тегів" style="width: 100%;">
                        @foreach($tags as $k=>$v)
                            <option value="{{$k}}">{{$v}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Зображення</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input" >
                            <label class="custom-file-label" for="thumbnail">Завантажити зображення</label>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Зберегти</button>
            </div>
        </form>

@endsection
