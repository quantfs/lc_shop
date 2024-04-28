@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
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
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('product.create') }}" class="btn btn-primary">Add</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Content</th>
                                    <th>Preview_image</th>
                                    <th>Price</th>
                                    <th>Count</th>
                                    <th>Is_published</th>
                                    <th>Category</th>
                                    <th>Group</th>
                                    <th>Tags</th>
                                    <th>Colors</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><a href="{{ route("product.show", $product->id) }}">{{ $product->title }}</a></td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->content }}</td>
                                        <td>{{ $product->preview_image }}
{{--                                        <img src="{{ $product->preview_image }}">--}}
{{--                                        <img src="{{ asset('storage/app/public/images/kbRs33YXRG76j3MeVMey6fTTwiCtZ1v9wHasVK2W.jpg') }}")>--}}
{{--                                        <img src="../../../storage/app/public/images/kbRs33YXRG76j3MeVMey6fTTwiCtZ1v9wHasVK2W.jpg">--}}
                                        <img src={{ Storage::url('app/public/images/kbRs33YXRG76j3MeVMey6fTTwiCtZ1v9wHasVK2W.jpg') }}>

                                        </td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->count }}</td>
                                        <td>{{ $product->is_published }}</td>
                                        <td>{{ $product->category->title }}</td>
                                        <td>{{ $product->group->title }}</td>
                                        <td>
                                            @foreach($product->tags as $tag)
                                                <span>
                                                    {{ $tag->title }}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($product->colors as $color)
                                                <div style="display: inline-block; width: 16px; height: 16px; background: {{ '#'.$color->title }}"></div>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

{{--https://ru.stackoverflow.com/questions/868951/laravel-%D0%BE%D1%82%D0%BE%D0%B1%D1%80%D0%B0%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5-%D0%BA%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BE%D0%BA-%D0%B8%D0%B7-public-storage--}}

