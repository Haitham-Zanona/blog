@extends('dashboard.layouts.layout')

@section('body')
    <!-- Breadcrumb -->
    {{ Breadcrumbs::render('category') }}



    <div class="container-fluid">

        <div class="animated fadeIn">
            <form action="{{ Route('dashboard.category.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ trans('words.categories') }}</strong>
                        </div>
                        <div class="card-block">




                            <div class="form-group col-md-12">
                                <label>{{ trans('words.image') }}</label>
                                <input type="file" name="image" class="form-control"
                                    placeholder="{{ trans('words.image') }}">

                            </div>

                            <div class="form-group col-md-12">
                                <label>{{ trans('words.status') }}</label>
                                <select name="parent" id="" class="form-control">

                                    <option value="0">Main Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header">
                                <strong>{{ trans('words.translations') }}</strong>
                            </div>
                            <div class="card-block">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    @foreach (config('app.languages') as $key => $lang)
                                        <li class="nav-item">
                                            <a class="nav-link @if ($loop->index == 0) active @endif"
                                                id="home-tab" data-toggle="tab" href="#{{ $key }}" role="tab"
                                                aria-controls="home" aria-selected="true">{{ $lang }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif"
                                            id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">
                                            <br>
                                            <div class="mt-3 form-group col-md-12">
                                                <label>{{ trans('words.title') }} - {{ $lang }}</label>
                                                <input type="text" name="{{ $key }}[title]"
                                                    class="form-control" placeholder="{{ trans('words.title') }}">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>{{ trans('words.content') }}</label>
                                                <textarea name="{{ $key }}[content]" class="form-control" cols="30" rows="10"></textarea>
                                            </div>



                                            <div>
                                                <label>{{ __('words.slug') }}</label>
                                                <input type="text" name="{{ $key }}[slug]" class="form-control"
                                                    placeholder="{{ __('words.slug') }}">
                                            </div>
                                        </div>
                                    @endforeach

                                </div>



                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                                    Submit</button>
                                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>
                                    Reset</button>
                            </div>

                        </div>



                    </div>
            </form>
        </div>
    </div>
@endsection
