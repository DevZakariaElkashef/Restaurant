@extends('admin/layouts/master')
@section('content')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12">

                    <div class="row">

                        <div class="col-xl-12  col-md-12">

                            <div class="mail-box-container">
                                <div class="mail-overlay"></div>

                                <div class="tab-title">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12 text-center mail-btn-container">
                                            <a id="btn-compose-mail" class="btn btn-block" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-12 mail-categories-container">

                                            <div class="mail-sidebar-scroll">

                                                <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link list-actions active" id="mailInbox"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span class="nav-names">Inbox</span> <span class="mail-badge badge"></span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link list-actions" id="important"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg> <span class="nav-names">Important</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link list-actions" id="draft"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg> <span class="nav-names">Draft</span> <span class="mail-badge badge"></span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link list-actions" id="sentmail"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg> <span class="nav-names"> Sent Mail</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link list-actions" id="trashed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> <span class="nav-names">Trash</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="mailbox-inbox" class="accordion mailbox-inbox">

                                    <div class="search">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                        <input type="text" class="form-control input-search" placeholder="Search Here...">
                                    </div>

                                    <div class="action-center">
                                        <div class="">
                                            <div class="n-chk">
                                                <label class="new-control new-checkbox checkbox-primary">
                                                  <input type="checkbox" class="new-control-input" id="inboxAll">
                                                  <span class="new-control-indicator"></span><span>Check All</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a class="nav-link dropdown-toggle d-icon label-group" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" data-toggle="tooltip" data-placement="top" data-original-title="Label" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></a>
                                            <div class="dropdown-menu dropdown-menu-right d-icon-menu">
                                                <a class="label-group-item label-personal dropdown-item position-relative g-dot-primary" href="javascript:void(0);"> Personal</a>
                                                <a class="label-group-item label-work dropdown-item position-relative g-dot-warning" href="javascript:void(0);"> Work</a>
                                                <a class="label-group-item label-social dropdown-item position-relative g-dot-success" href="javascript:void(0);"> Social</a>
                                                <a class="label-group-item label-private dropdown-item position-relative g-dot-danger" href="javascript:void(0);"> Private</a>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" data-toggle="tooltip" data-placement="top" data-original-title="Important" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star action-important"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip" data-placement="top" data-original-title="Spam" class="feather feather-alert-circle action-spam"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" data-toggle="tooltip" data-placement="top" data-original-title="Revive Mail" stroke-linejoin="round" class="feather feather-activity revive-mail"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip" data-placement="top" data-original-title="Delete Permanently" class="feather feather-trash permanent-delete"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                            <div class="dropdown d-inline-block more-actions">
                                                <a class="nav-link dropdown-toggle" id="more-actions-btns-dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="more-actions-btns-dropdown">
                                                    <a class="dropdown-item action-mark_as_read" href="javascript:void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg> Mark as Read
                                                    </a>
                                                    <a class="dropdown-item action-mark_as_unRead" href="javascript:void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> Mark as Unread
                                                    </a>
                                                    <a class="dropdown-item action-delete" href="javascript:void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip" data-placement="top" data-original-title="Delete" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Trash
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            
                                    <div class="message-box">
                                        
                                        <div class="message-box-scroll" id="ct">
                                            @foreach ($messages as $message)
                                                <div class="mail-item {{ $message->status }}">
                                                    <div class="animated animatedFadeInUp fadeInUp" id="{{ $message->tag }}">
                                                        <div class="mb-0">
                                                            <div class="mail-item-heading personal collapsed"  data-toggle="collapse" role="navigation" data-target="#{{ $message->tag }}" aria-expanded="false">
                                                                <div class="mail-item-inner">

                                                                    <div class="d-flex">
                                                                        <div class="n-chk text-center">
                                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                            <input type="checkbox" class="new-control-input inbox-chkbox">
                                                                            <span class="new-control-indicator"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="f-body" data-mailfrom="info@mail.com" data-mailto="{{ $message->email }}" data-mailcc="">
                                                                            <div class="meta-mail-time">
                                                                                <p class="user-email" data-mailTo="{{ $message->email }}">{{ $message->name }}</p>
                                                                            </div>
                                                                            <div class="meta-title-tag">
                                                                                <p class="mail-content-excerpt" data-maildescription="{{ $message->content }}"><span class="mail-title" data-mailTitle="Web Design News"></span>{{ $message->content }}</p>
                                                                                <div class="tags">
                                                                                    <span class="g-dot-primary"></span>
                                                                                    <span class="g-dot-warning"></span>
                                                                                    <span class="g-dot-success"></span>
                                                                                    <span class="g-dot-danger"></span>
                                                                                </div>
                                                                                <p class="meta-time align-self-center">{{ $message->created_at }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="content-box">
                                        <div class="d-flex msg-close">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left close-message"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                                            <h2 class="mail-title" data-selectedMailTitle=""></h2>
                                        </div>
                                        @foreach ($messages as $message)
                                            <div id="{{ $message->tag }}" class="collapse" aria-labelledby="{{ $message->tag }}" data-parent="#mailbox-inbox">
                                                <div class="mail-content-container sentmail" data-mailfrom="info@mail.com" data-mailto="{{ $message->email }}" data-mailcc="">

                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div class="d-flex user-info">
                                                            <div class="f-head">
                                                                <img src="assets/img/90x90.jpg" class="user-profile" alt="avatar">
                                                            </div>
                                                            <div class="f-body">
                                                                <div class="meta-title-tag">
                                                                    <h4 class="mail-usr-name" data-mailtitle="Promotion Page">{{ $message->name }}</h4>
                                                                </div>
                                                                <div class="meta-mail-time">
                                                                    <div class="">
                                                                        <p class="user-email" data-mailto="{{ $message->email }}"><span>To,</span> {{ $message->email }}</p>
                                                                    </div>
                                                                    <p class="mail-content-meta-date current-recent-mail">{{ $message->created_at }} -</p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <p class="mail-content" data-mailTitle="Mozilla Update" data-maildescription='{"ops":[{"insert":".{{ $message->content }}."\n"}]}'></p>

                                                    <p>{{ $message->content }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="composeMailModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            <div class="compose-box">
                                                <div class="compose-content">
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="d-flex mb-4 mail-form">
                                                                    <p>From:</p>
                                                                    <select class="" id="m-form">
                                                                        <option value="info@mail.com">Info &lt;info@mail.com&gt;</option>
                                                                        <option value="shaun@mail.com">Shaun Park &lt;shaun@mail.com&gt;</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="d-flex mb-4 mail-to">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                                    <div class="">
                                                                        <input type="email" id="m-to" placeholder="To" class="form-control">
                                                                        <span class="validation-text"></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="d-flex mb-4 mail-cc">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                                                                    <div>
                                                                        <input type="text" id="m-cc" placeholder="Cc" class="form-control">
                                                                        <span class="validation-text"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mb-4 mail-subject">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                                            <div class="w-100">
                                                                <input type="text" id="m-subject" placeholder="Subject" class="form-control">
                                                                <span class="validation-text"></span>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex">
                                                            <input type="file" class="form-control-file" id="mail_File_attachment" multiple="multiple">
                                                        </div>

                                                        <div id="editor-container">

                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="btn-save" class="btn float-left"> Save</button>
                                            <button id="btn-reply-save" class="btn float-left"> Save Reply</button>
                                            <button id="btn-fwd-save" class="btn float-left"> Save Fwd</button>

                                            <button class="btn" data-dismiss="modal"> <i class="flaticon-delete-1"></i> Discard</button>

                                            <button id="btn-reply" class="btn"> Reply</button>
                                            <button id="btn-fwd" class="btn"> Forward</button>
                                            <button id="btn-send" class="btn"> Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>
            </div>

        </div>
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
   
@endsection