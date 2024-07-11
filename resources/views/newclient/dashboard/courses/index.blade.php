
@extends('newclient.dashboard.layouts.main')
@section('content_dashboard')
<div class="row">
    <div class="col-md-12">
        <div class="settings-widget">
            <div class="settings-inner-blk p-0">
                <div class="sell-course-head comman-space">
                    <h3>Khóa học của tôi</h3>

                </div>
                <div class="comman-space pb-0">
                    <div class="instruct-search-blk">
                        <div class="show-filter choose-search-blk">
                                <div class="row gx-2 align-items-center">
                                    <div class="col-md-6 col-item">
                                        <div class=" search-group">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <input data-asset="{{asset('')}}" data-url = "{{ route('searchFromDashboard', auth()->id()) }}" id="searchInput" type="text" class="form-control" placeholder="Tìm kiếm khóa học...">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-item">
                                        <div class="form-group select-form mb-0">
                                            <select id="filterByCategory" data-asset="{{ asset('') }}" class="form-select select"  data-url="{{ route('dashboard.filterByCategory', 4)  }}" name="sellist1">
                                                    <option value="0">Tất cả</option>
                                                  @foreach($categories as $item)
                                                    <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                                                  @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="settings-tickets-blk course-instruct-blk table-responsive">

                        <!-- Referred Users-->
                        <table class="table table-nowrap mb-2">
                            <thead>
                                <tr>
                                    <th>KHÓA HỌC</th>
                                    <th>HOÀN THÀNH</th>
                                    <th>TRẠNG THÁI</th>
                                </tr>
                            </thead>
                            <tbody id="showCourseFilter">
                            @foreach($data as $item)
                                <tr>
                                    <td>
                                        <div class="sell-table-group d-flex align-items-center">
                                            <div class="sell-group-img">
                                                <a href="{{ route('detail.courses', $item -> CourseID) }}">
                                                    <img src="{{asset($item -> course -> ImageData)}}" class="img-fluid " alt="">
                                                </a>
                                            </div>
                                            <div class="sell-tabel-info">
                                                <p><a href="{{ route('detail.courses', $item -> CourseID) }}">{{ $item -> course -> CourseName }}</a></p>
                                                <div class="course-info d-flex align-items-center border-bottom-0 pb-0">
                                                    <div class="rating-img d-flex align-items-center">
                                                        <img src="{{asset('img/icon/icon-01.svg')}}" alt="">
                                                        <p>{{ $item -> course -> LessonCount }} Bài học</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item -> DonePercent }}%</td>
                                    @if( $item -> isDone == 1)
                                        <td><span class="badge info-low">Đã hoàn thành</span></td>
                                    @else
                                        <td><span class="badge badge-danger">Chưa hoàn thành</span></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /Referred Users-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
