<?php
//var_dump($senders);die;
//?><!---->
@extends('newclient.student.layouts.main')
@section('content_student')
    <!-- Course Lesson -->
    <section class="page-content course-sec course-message">
        <div class="container">
            <div class="student-widget message-student-widget">
                <div class="student-widget-group">
                    <div class="col-md-12">
                        <div class="add-compose">
                            <a href="javascript:;" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Compose</a>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <div class="chat-window">
                            <!-- Chat Left -->
                            <div class="chat-cont-left">
                                <div class="chat-users-list">
                                    <div class="chat-scroll list-senders">
                                        <?php
                                        $index = 0;
                                        ?>
                                        @foreach($senders as $sender)
                                            <a type="button"
                                               data-url="{{ route('getChatWithUser',$sender -> user -> id) }}"
                                               data-sendersID="{{ $sender -> user -> id }}"
                                               class="media d-flex show-chat" id="showChat{{$sender -> user -> id}}">
                                                <div class="media-img-wrap flex-shrink-0">
                                                    <div class="avatar avatar-away">
                                                        <img src="{{ asset($sender -> user -> avatar) }}"
                                                             alt="User Image"
                                                             class="avatar-img rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="media-body flex-grow-1">
                                                    <div>
                                                        <div
                                                            class="user-name">{{ $sender -> user -> firstName .  $sender -> user -> lastName}}</div>
                                                        <div
                                                            class="user-last-chat">{{$lastMessages[$index]['content']}}</div>
                                                    </div>
                                                    @if($lastMessages[$index]['read_at'] == null)
                                                        <div class="badge-active">
                                                            <div class="badge bgg-yellow badge-pill">
                                                                    <?php
                                                                    $countUnread = \App\Models\Message::query()
                                                                        ->where('user_id', $sender->user->id)
                                                                        ->where('read_at', null)
                                                                        ->count();
                                                                    echo $countUnread;
                                                                    ?>
                                                            </div>
                                                        </div>
                                                    @endif
                                                        <?php
                                                        $index++;
                                                        ?>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- /Chat Left -->

                            <!-- Chat Right -->
                            <div class="chat-cont-right">

                            </div>
                            <!-- /Chat Right -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Course Lesson -->
    @include('newclient.layouts.scripts')
@endsection
