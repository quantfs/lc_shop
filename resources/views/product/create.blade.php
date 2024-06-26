@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="title">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ old('description') }}" name="description" class="form-control" placeholder="description">
                        </div>
                        <div class="form-group">
                            <textarea name="content" class="form-control" cols="30" rows="10" placeholder="content">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ old('price') }}" name="price" class="form-control" placeholder="price">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ old('count') }}" name="count" class="form-control" placeholder="count">
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <select name="category_id" class="tags" style="width: 100%;">
                                <option disabled selected>Select category</option>
                                @foreach($categories as $category) {
                                    <option value={{ $category->id }}>{{ $category->title }}</option>
                                }
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="group_id" class="tags" style="width: 100%;">
                                <option disabled selected>Select group</option>
                                @foreach($groups as $group) {
                                <option value={{ $group->id }}>{{ $group->title }}</option>
                                }
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select a tag" style="width: 100%;">
                                @foreach($tags as $tag) {
                                    <option value={{ $tag->id }}>{{ $tag->title }}</option>
                                }
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Select a color" style="width: 100%;">
                                @foreach($colors as $color) {
                                    <option value={{ $color->id }}>{{ $color->title }}</option>
                                }
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

