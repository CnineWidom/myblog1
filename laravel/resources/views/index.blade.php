    @extends('header')
    @section('title', '个人主页')

    {{--@if ($user != null)--}}
        {{--<p>{{$user}}</p>--}}
    {{--@else <a href="dologin">登录</a>--}}
    {{--@endif--}}
    {{--头像<img src="{{$image}}" width="200Px" height="200px" alt="">--}}
    @section('sidebar')
        {{--@parent--}}
        <p>子页插入数据</p>
    @endsection
    @section('content')
        <form action="upload/doupload" id="form1" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            标题：<input type="text" name="title" id="">
            作者:<input type="text" name="author" id="">
            <input type="file" name="file" id="">
            <input type="submit"  id = 'upload' value="上传">
            <input type="hidden" name="image_load" value="{{$image}}">
            <input type="hidden" name="user" value="{{$user}}">
            <input type="hidden" name="id" value="{{$id}}">
            <input id="download" type="submit"  name='dowmload' value="下载该头像">
        </form>
    @endsection
    @section('script')
        @parent
        <script>
            $(document).ready(function () {
                $('#download').click(function () {
                    $('#form1').attr('action','upload/download');
                })
                $('#upload').click(function () {
                    $('#form1').attr('action','upload/doupload');
                })
            })
        </script>
    @endsection
