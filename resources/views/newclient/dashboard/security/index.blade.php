@extends('newclient.dashboard.layouts.main')
@section('content_dashboard')
<div class="settings-widget profile-details">
    <div class="settings-menu p-0">
        <div class="profile-heading">
            <h3>Security</h3>
            <p>Edit your account settings and change your password here.</p>
        </div>
        <div class="checkout-form personal-address border-line">
            <div class="personal-info-head">
                <h4>Email Address</h4>
                <p>Your current email address is <span><a href="https://dreamslms.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7b161a030c1e17173b1e031a160b171e55181416">[email&#160;protected]</a></span></p>
            </div>
            <form action="#">
                <div class="new-address">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">New email address</label>
                                <input type="text" class="form-control" placeholder="Enter your New email address">
                            </div>
                        </div>
                        <div class="profile-share d-flex ">
                            <button type="button" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="checkout-form personal-address">
            <div class="personal-info-head">
                <h4>Change Password</h4>
                <p>We will email you a confirmation when changing your password, so please expect that email after submitting.</p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="#">
                        <div class="form-group">
                            <label class="form-control-label">Current password</label>
                            <input type="password" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Password</label>
                            <div class="pass-group" id="passwordInput">
                                <input type="password" class="form-control pass-input" placeholder="Enter your password">
                            </div>
                            <div  class="password-strength" id="passwordStrength">
                                <span id="poor"></span>
                                <span id="weak"></span>
                                <span id="strong"></span>
                                <span id="heavy"></span>
                            </div>
                            <div id="passwordInfo"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Confirm New Password</label>
                            <input type="password" class="form-control" >
                        </div>
                        <div class="update-profile save-password">
                            <button type="button" class="btn btn-primary">Save Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
