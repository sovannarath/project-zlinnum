@if(isset($no_permission) && $no_permission === true)
    <div style="width: 100%;height: 100%;background: rgba(139,0,0,0.50);position: fixed;right: 0;z-index: 500">
        <span style="color: white;
    font-size: 30px;
    vertical-align: middle;
    text-align: center;
    width: 100%;
    display: block;
    top: 40%;
    position: relative;text-shadow: 2px 3px 3px #000000ad">Access Denied</span>
    </div>
    <script>
        $('body').css('overflow','hidden');
    </script>
@endisset
