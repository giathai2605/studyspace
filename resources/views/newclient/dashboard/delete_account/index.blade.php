@extends('newclient.dashboard.layouts.main')
@section('content_dashboard')
<div class="settings-widget profile-details">
    <div class="settings-menu p-0">
        <div class="profile-heading">
            <h3>Delete your account</h3>
            <p>Delete or Close your account permanently.</p>
        </div>
        <div class="checkout-form personal-address">
            <div class="personal-info-head">
                <h4>Warning</h4>
                <p>If you close your account, you will be unsubscribed from all your 0 courses, and will lose access forever.</p>
            </div>
            <div class="un-subscribe p-0">
                <a href="#" class="btn btn-danger">Delete My Account</a>
            </div>
        </div>
    </div>
</div>
@endsection
