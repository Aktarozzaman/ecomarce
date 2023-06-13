<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
    <title>AR - Fashion </title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

    <div class="hero_area">
        @include('home.header')
        <!-- slider section -->
        @include('home.slider')
        <!-- end slider section -->
    </div>
    @include('home.why')

    @include('home.new_arrival')
    @include('sweetalert::alert')


    @include('home.product')

    {{-- comment and replay system starts here --}}
    {{-- comment and reply system starts here --}}
    <div style="text-align:center">
        <h1 style="text-align:center;font-size:30px;padding-top:10px;padding-bottom:20px; ">Comment</h1>

        <form action="{{ url('add_comment') }}" method="POST">
            @csrf
            <textarea style="height: 150px;width:400px" name="comment" placeholder="Comment Something here"></textarea> <br>
            <button class="btn btn-primary" type="submit">Comment</button>
        </form>
    </div>

<div style="padding-left: 20%; padding-top: 10px">
    <h1 style="font-size: 20px;">All Comments</h1>

    @if ($comments->count() > 0)
        @foreach ($comments as $comment)
            <div>
                <b>{{ $comment->name }}</b>
                <p>{{ $comment->comment }}</p>
                <a href="javascript:void(0)" onclick="toggleReplyBox(this)">Reply</a>

                <div style="display: none" class="replyDiv">
                    <form action="{{ route('replay.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <textarea style="height: 100px;width:300px" name="reply" placeholder="Reply here"></textarea><br>
                        @if (auth()->check())
                            <input type="hidden" name="name" placeholder="Your Name" value="{{ auth()->user()->name }}" readonly><br>
                        @else
                            
                        @endif
                        <button class="btn btn-primary" type="submit">Reply</button>
                        <a href="javascript:void(0)" class="btn" onclick="toggleReplyBox(this)">Close</a>
                    </form>
                </div>

                @if ($comment->replies->count() > 0)
                    <div style="padding-left: 20px">
                        @foreach ($comment->replies as $reply)
                            <div>
                                <b>{{ $reply->name }}</b>
                                <p>{{ $reply->reply }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
        {{-- {{ $comments->links() }} --}}

    @else
        <p>No comments available.</p>
    @endif
</div>

<script>
    function toggleReplyBox(caller) {
        var replyDiv = $(caller).siblings('.replyDiv');
        $('.replyDiv').not(replyDiv).hide();
        replyDiv.toggle();
    }
</script>





   

    {{-- comment and replay system end here --}}



    @include('home.subscribe')
    @include('home.clint')
    @include('home.footer')

    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Aktar.io</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>

    <script type="text/javascript">
        function reply(caller) {
            // document.getElementById("commentId").value=$(caller).attr('data-Commentid');
            // document.getElementByID('CommentId').value=$(caller).attr('data-Commentid');
            // document.getElementById("commentId").value=$(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }

        function replay_close(caller) {

            $('.replyDiv').hide();
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    <!-- popper js -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <script></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('home/js/custom.js') }}"></script>


</body>

</html>
