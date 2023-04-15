@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
        </div>
    </div>
    <div class="row">
                        <form role="form" method="post" action="{{ route('posts.update',['post'=>$post->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Назва</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           value="{{$post->title}}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Цитата</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" >{{$post->description}}</textarea>

                                </div>


                                <div class="form-group">
                                    <label for="content">Текст</label>
                                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="5">{{$post->content}}</textarea>

                                </div>

                                <div class="form-group">
                                    <label class="category_id"> Категорія </label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        @foreach($categories as $k=>$v)

                                            <option value="{{$k}}" @if($k ==$post->category_id) selected @endif>{{$v}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tags">Теги</label>
                                    <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Вибір тегів" style="width: 100%;">
                                        @foreach($tags as $k=>$v)
                                            <option value="{{$k}}" @if(in_array($k,$post->tags->pluck('id')->all())) selected @endif>{{$v}}</option>
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

                                    <div><img src="{{$post->getImage()}}" alt="" class="img-thumbnail  mt-2" width="160"  ></div>

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Зберегти</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
@endsection

