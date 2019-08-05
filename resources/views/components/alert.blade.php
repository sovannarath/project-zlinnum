<link rel="stylesheet" href="{{asset('assets/custom/css/alert.css')}}">
<script src="{{asset('assets/custom/js/alert.js')}}"></script>
<div class="background-mode popup-model" status="false">
    <div class="main-layout-alert">
        <div class="title">{{$title}}</div>
        <div class="body">
            {{$message}}
        </div>
        <div class="footer-alert">
            <span class="btn-custom cancel-btn">Cancel</span>
            <span class="btn-custom action-btn-{{$class_action}}">{{$action}}</span>
        </div>
    </div>
</div>
