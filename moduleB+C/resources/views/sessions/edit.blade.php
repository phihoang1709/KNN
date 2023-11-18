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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('event')}}">Nền tảng sự kiện</a>
        <span class="navbar-organizer w-100">{{ session()->get('user')->name }}</span>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" id="logout" href="{{ route('logout') }}">Đăng xuất</a>
            </li>
        </ul>
    </nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="events/index.html">Quản lý sự kiện</a></li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>{{$event->name}}</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link active" href="{{route('events.show', ['id'=>$event->id])}}">Tổng quan</a></li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Báo cáo</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item"><a class="nav-link" href="reports/index.html">Công suất phòng</a></li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="border-bottom mb-3 pt-3 pb-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                    <h1 class="h2">{{$event->name}}</h1>
                </div>
                <span class="h6">{{$event->date}}</span>
            </div>

            <div class="mb-3 pt-3 pb-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                    <h2 class="h4">Tạo phiên mới</h2>
                </div>
            </div>

            <form method="POST" class="needs-validation" novalidate action="{{route('sessions.update', ['id' => $event->id, 'session_id' => $session->id])}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="selectType">Loại</label>
                        <select class="form-control" id="selectType" name="type" >
                            <option value="talk" selected>Talk</option>
                            <option value="workshop">Workshop</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputTitle">Tiêu đề</label>
                        
                        @if(!$errors->has('title'))
                        <input type="text" class="form-control" id="inputTitle" name="title" placeholder="" value="{{$session->title}}">
                        @else
                        <input type="text" class="form-control is-invalid" id="inputTitle" name="title" placeholder="" value="">
                        <div class="invalid-feedback">
                            Tiêu đề không được để trống.
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputSpeaker">Người trình bày</label>
                        @if(!$errors->has('speaker'))
                        <input type="text" class="form-control" id="inputSpeaker" name="speaker" placeholder="" value="{{$session->speaker}}">
                        @else
                        <input type="text" class="form-control is-invalid" id="inputSpeaker" name="speaker" placeholder="" value="">
                        <div class="invalid-feedback">
                            Người trình bày không được để trống.
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="selectRoom">Phòng</label>
                        <select class="form-control" id="selectRoom" name="room">
                            @foreach($rooms as $room)
                                <option value="{{$room->id}}">{{$room->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputCost">Chi phí</label>
                        @if(!$errors->has('cost'))
                        <input type="number" class="form-control" id="inputCost" name="cost" placeholder="" value="{{$session->cost}}">
                        @else
                        <input type="number" class="form-control is-invalid" id="inputCost" name="cost" placeholder="" value="0">
                        <div class="invalid-feedback">
                            Chi phí không được để trống.
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="inputStart">Bắt đầu</label>
                        
                        @if(!$errors->has('start'))
                        <input type="datetime-local"
                               class="form-control"
                               id="inputStart"
                               name="start"
                               placeholder="yyyy-mm-dd HH:MM"
                               value="{{$session->start}}">
                        @else
                        <input type="datetime-local"
                               class="form-control is-invalid"
                               id="inputStart"
                               name="start"
                               placeholder="yyyy-mm-dd HH:MM"
                               value="">
                        <div class="invalid-feedback">
                            Thời gian bắt đầu không được để trống.
                        </div>
                        @endif
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="inputEnd">Kết thúc</label>
                            @if(!$errors->has('start'))
                               <input type="datetime-local"
                               class="form-control"
                               id="inputEnd"
                               name="end"
                               placeholder="yyyy-mm-dd HH:MM"
                               value="{{$session->end}}">
                            @else
                               <input type="datetime-local"
                               class="form-control is-invalid"
                               id="inputEnd"
                               name="end"
                               placeholder="yyyy-mm-dd HH:MM"
                               value="">
                               <div class="invalid-feedback">
                                   Thời gian kết thúc không được để trống.
                               </div>
                            @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="textareaDescription">Mô tả</label>
                        @if(!$errors->has('description'))
                        <textarea class="form-control" id="textareaDescription" name="description" placeholder="" rows="5"></textarea>
                        @else
                        <textarea class="form-control is-invalid" id="textareaDescription" name="description" placeholder="" rows="5"></textarea>
                        <div class="invalid-feedback">
                            Mô tả không được để trống.
                        </div>
                        @endif
                        
                    </div>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary" type="submit">Lưu phiên</button>
                <a href="{{route('events.show', ['id' => $event->id])}}" class="btn btn-link">Bỏ qua</a>
            </form>

        </main>
    </div>
</div>

</body>
</html>
