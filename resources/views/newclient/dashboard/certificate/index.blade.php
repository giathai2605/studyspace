
@extends('newclient.dashboard.layouts.main')
<style>
    .frameCertificate {
        -ms-zoom: 0.5;
        -moz-transform: scale(0.5);
        -moz-transform-origin: 0 0;
        -o-transform: scale(0.5);
        -o-transform-origin: 0 0;
        -webkit-transform: scale(0.75);
        -webkit-transform-origin: 0 0;
    }
    .frameCertificate {
        width: 700px;
        height: 400px;
        border: 1px solid black;
    }

</style>
@section('content_dashboard')
    <div class="row">
        <div class="col-md-12">
            <div class="settings-widget">
                <div class="settings-inner-blk p-0">
                    <div class="sell-course-head comman-space">
                        <h3>Chứng chỉ của tôi</h3>

                    </div>
                    <div class="comman-space pb-0">
                        <div class="instruct-search-blk">
                            <div class="show-filter choose-search-blk">
                                <div class="row gx-2 align-items-center">
                                    <div class="col-md-6 col-item">
{{--                                        <div class=" search-group">--}}
{{--                                            <i class="fa-solid fa-magnifying-glass"></i>--}}
{{--                                            <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--                                            <input data-asset="{{asset('')}}" data-url = "{{ route('searchFromDashboard', auth()->id()) }}" id="searchInput" type="text" class="form-control" placeholder="Tìm kiếm khóa học...">--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-item">
                                        <div class="form-group select-form mb-0">
                                            <select id="filterCertificateByCategory" data-asset="{{ asset('') }}" class="form-select select"  data-url="{{ route('dashboard.filterCertificateByCategory', 4)  }}" name="sellist1">
                                                <option value="0">Tất cả</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="settings-tickets-blk course-instruct-blk table-responsive">
                            <div class="row" id="showCertificate">
                                @foreach($certificates as $item)

                                <div class="col-lg-12 col-md-6">
                                    <div class="card stat-info ttl-tickets">
                                        <div class="card-body">
                                            <div class="view-all-grp d-flex">
                                                <div class="student-ticket-view">
                                                    <h3>{{ $item -> course -> CourseName }}</h3>
                                                    <p>{{ $item->created_at->format('d/m/Y H:i:s') }}</p>
                                                    <a style="text-decoration: none" href="{{route('certificate.preview', [$item -> courseID, $item -> userID])}}" >Chi tiết</a><br>
                                                </div>
                                                <div class="img-deposit-ticket col-md-8">
                                                    <iframe class="frameCertificate" src="{{ route('certificate.preview', [$item -> courseID, $item -> userID]) }}"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
