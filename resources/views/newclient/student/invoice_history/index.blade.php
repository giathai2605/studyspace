@extends('newclient.student.layouts.main')
@section('content_student')
    <!-- invoice history view -->
    <div class="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Profile Details -->
                <div class="col-xl-9 col-md-8">
                    <div class="settings-widget profile-details">
                        <div class="settings-menu invoice-list-blk p-0 ">
                            <div class="card pro-post border-0 mb-0">
                                <div class="card-body">
                                    <div class="invoice-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="invoice-logo">
                                                    <img src="assets/img/logo.svg" alt="logo">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="invoice-details">
                                                    <strong>Đơn hàng:</strong> #00124 <br>
                                                    <strong>Ngày phát hành:</strong> 20/10/2021
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Invoice Item -->
                                    <div class="invoice-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="invoice-info">
                                                    <strong class="customer-text">Hoá đơn</strong>
                                                    <p class="invoice-details invoice-details-two">
                                                        Họ và tên: John Doe <br>
                                                        Địa chỉ: 806  Twin Willow Lane, Old Forge,<br>
                                                        Newyork, USA <br>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="invoice-info invoice-info2">
                                                    <strong class="customer-text">Phương thức thanh toán</strong>
                                                    <p class="invoice-details">
                                                        Thẻ ghi nợ
                                                        XXXXXXXXXXXX-2541
                                                        HDFC Bank<br>
                                                    </p>
                                                </div>
                                            </div>
                                            {{-- <div class="invoice-item">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="invoice-info">
                                                            <strong class="customer-text">Payment Method</strong>
                                                            <p class="invoice-details invoice-details-two">
                                                                Debit Card <br>
                                                                XXXXXXXXXXXX-2541 <br>
                                                                HDFC Bank<br>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <!-- /Invoice Item -->

                                    <!-- Invoice Item -->

                                    <!-- /Invoice Item -->

                                    <!-- Invoice Item -->
                                    <div class="invoice-item invoice-table-wrap">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="invoice-table table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Tên khoá học</th>
                                                                <th>Mô tả</th>
                                                                <th class="text-center">Só lượng</th>
                                                                <th class="text-end">Tổng tiền</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Research</td>
                                                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                                                <td class="text-center">1</td>
                                                                <td class="text-end">$100</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Research 101</td>
                                                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                                                <td class="text-center">1</td>
                                                                <td class="text-end">$250</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-4 ms-auto">
                                                <div class="table-responsive">
                                                    <table class="invoice-table-two table table-borderless">
                                                        <tbody>
                                                            <tr>
                                                                <th>Tiền:</th>
                                                                <td><span>$350</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tổng tiền:</th>
                                                                <td><span>$315</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Invoice Item -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Profile Details -->

            </div>
        </div>
    </div>
    <!-- invoice history view -->
@endsection
