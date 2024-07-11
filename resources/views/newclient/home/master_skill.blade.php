<!-- Master Skill -->
<section class="section master-skill">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="section-header aos" data-aos="fade-up">
                    <div class="section-sub-head">
                        <span>Có gì mới!</span>
                        <h2>Nắm vững các kỹ năng để thúc đẩy sự nghiệp của bạn</h2>
                    </div>
                </div>
                <div class="section-text aos" data-aos="fade-up">
                    <p>Nhận chứng chỉ, nắm vững các kỹ năng công nghệ hiện đại và thăng tiến trong sự nghiệp của bạn —
                        cho dù bạn mới bắt đầu
                        hoặc một chuyên gia dày dạn kinh nghiệm. 95% người học eLearning cho biết nội dung thực hành của
                        chúng tôi đã trực tiếp giúp họ
                        sự nghiệp.</p>
                </div>
                <div class="career-group aos" data-aos="fade-up">
                    <div class="row">
                        @foreach($categories as $category)
                            <a href="{{ route('filterByCategory.courses', ['id' => $category->id]) }}"
                               data-category-id="{{ $category->id }}"
                               class="col-lg-6 col-md-6 d-flex category-link">
                                <div class="certified-group blur-border d-flex">
                                    <div class="get-certified d-flex align-items-center">
                                        <div class="blur-box">
                                            <div class="certified-img ">
                                                <img src="{{asset('img/icon/icon-1.svg')}}" alt=""
                                                     class="img-fluid">
                                            </div>
                                        </div>
                                        <p>Khóa học: <b>{{$category->name}}</b></p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 d-flex align-items-end">
                <div class="career-img aos" data-aos="fade-up">
                    <img src="{{asset('img/join.png')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Master Skill -->
