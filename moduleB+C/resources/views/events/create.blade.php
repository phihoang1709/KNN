<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Backend</title>

    <base href="{{ asset('') }}">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="assets/css/custom.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="events/index.html">Nền tảng sự kiện</a>
        <span class="navbar-organizer w-100">{{ session()->get('user')->name }}</span>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" id="logout" href="{{ route('logout') }}">Đăng xuất</a>
            </li>
        </ul>
    </nav>

<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('event')}}">Nền tảng sự kiện</a>
            <span class="navbar-organizer w-100">{{ session()->get('user')->name }}</span>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" id="logout" href="{{ route('logout') }}">Đăng xuất</a>
                </li>
            </ul>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Quản lý sự kiện</h1>
            </div>

            <div class="mb-3 pt-3 pb-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                    <h2 class="h4">Tạo sự kiện mới</h2>
                </div>
            </div>

           

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            <form method="POST" class="needs-validation" novalidate action="{{route("events.store")}}">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputName">Tên</label>
                        @if(!$errors->has('name'))
                        <input type="text"  class="form-control " id="inputName" name="name" placeholder="" value="">
                        @else
                        <input type="text"  class="form-control is-invalid" id="inputName" name="name" placeholder="" value="">
                        <div class="invalid-feedback">
                            Tên không được để trống.
                        </div>
                        @endif
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputSlug">Slug</label>
                        @if(!$errors->has('slug'))
                        <input type="text" class="form-control" id="inputSlug" name="slug" placeholder="" value="">
                        @else
                        <input type="text" class="form-control is-invalid" id="inputSlug" name="slug" placeholder="" value="">
                        <div class="invalid-feedback ">
                            Slug không được để trống.
                        </div>
                        @endif
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputDate">Ngày</label>
                        @if(!$errors->has('date'))
                        <input type="date"
                               class="form-control"
                               id="inputDate"
                               name="date"
                               placeholder="yyyy-mm-dd"
                               value="">
                        @else
                        <input type="date"
                               class="form-control is-invalid"
                               id="inputDate"
                               name="date"
                               placeholder="yyyy-mm-dd"
                               value="">
                        <div class="invalid-feedback">
                            Date không được để trống.
                        </div>
                        @endif
                    </div>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary" type="submit">Lưu sự kiện</button>
                <a href="{{route('event')}}" class="btn btn-link">Bỏ qua</a>
            </form>

        </main>
    </div>
</div>

</body>
</html>
