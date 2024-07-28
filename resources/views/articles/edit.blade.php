@extends('layouts.login')

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية </a></li>
                            <li class="breadcrumb-item"><a href="{{route('articles')}}">الاقسام الفرعية</a></li>
                            <li class="breadcrumb-item active">إضافة قسم فرعي</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">تعديل  مقال</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @include('includes.alerts.success')
                            @include('includes.alerts.errors')
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action= "{{route('articles.update',$articles -> id)}}"
                                  
                                     method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{asset('assets\images\articles/'.$articles  -> photo)}}"
                                                        class="rounded-circle  height-250" alt="صورة المقال   ">
                                                </div>
                                            </div>


                                        <div class="form-group">
                                            <label>لوجو مقال</label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="file" name="photo">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('photo')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> بيانات مقال</h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="title">title</label>
                                                        <input type="text" id="content"   value="{{$articles -> title}}"  class="form-control" name="title" required>
                                                        @error("title")
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="content">المحتوى</label>
                                                        <input type="text" id="content"   value="{{$articles -> content}}"  class="form-control" name="content" required>
                                                        @error("content")
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                      
                                          </div>
                                          <div class="form-group">
                                                            <label for="projectinput2">   أختر القسم  </label>
                                                            <select name="categories" class="select2 form-control">
                                                                <optgroup label=" من فضلك أختر القسم ">
                                                                   
                                                                         
                                                                <option value="Politics"> Politics </option>
                                                                <option  value="Entertainment">Entertainment</option>
                                                                <option   value="Sports">Sports</option>
                                                                @error("categories")
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                                </optgroup>
                                                            </select>
                                        </div>

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> حفظ
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>

@endsection
