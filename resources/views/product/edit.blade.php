@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit product</h1>
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
                    <form action="{{ route('product.update', $product->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input type="text" name="Title" value="{{ $product->title }}" class="form-control" placeholder="title">
                        </div>
                        <div class="form-group">
                            <input type="text" name="Description" value="{{ $product->description }}" class="form-control" placeholder="description">
                        </div>
                        <div class="form-group">
                            <input type="text" name="Content" value="{{ $product->content }}" class="form-control" placeholder="content">
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
                            <input type="text" name="Price" value="{{ $product->price }}" class="form-control" placeholder="price">
                        </div>
                        <div class="form-group">
                            <input type="text" name="Count" value="{{ $product->count }}" class="form-control" placeholder="count">
                        </div>
                        <div class="form-group">
                            <input type="text" name="Is_published" value="{{ $product->is_published }}" class="form-control" placeholder="is_published">
                        </div>
                        <div class="form-group">
                            <select name="category_id" class="tags" style="width: 100%;">
                                @foreach($categories as $category){
                                    <option {{ $category->id == $product->category_id ? 'selected' : '' }} value={{ $category->id }}>{{ $category->title }}</option>
                                }
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select a tag" style="width: 100%;">
                                @foreach($tags as $tag) {
                                    @foreach($product->tags as $productTags) {
                                        <option {{ $tag->id == $productTags->id ? 'selected' : '' }} value={{ $tag->id }}>{{ $tag->title }}</option>
                                    }
                                    @endforeach
                                }
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select a tag" style="width: 100%;">
                                @foreach($colors as $color) {
                                    @foreach($product->colors as $productColors) {
                                        <option {{ $color->id == $productColors->id ? 'selected' : '' }} value={{ $color->id }}>{{ $color->title }}</option>
                                    }
                                    @endforeach
                                }
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Edit">
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

