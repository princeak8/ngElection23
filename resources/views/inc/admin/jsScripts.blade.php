 <!-- Javascripts -->
        <script src="{{asset('assets/admin/plugins/jquery/jquery-3.1.0.min.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/uniform/js/jquery.uniform.standalone.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.3/axios.min.js" integrity="sha512-L4lHq2JI/GoKsERT8KYa72iCwfSrKYWEyaBxzJeeITM9Lub5vlTj8tufqYk056exhjo2QDEipJrg6zen/DDtoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @if($page!='home') <script src="{{asset('assets/admin/plugins/switchery/switchery.min.js')}}"></script> @endif
        @if($page=='albums')
        	<script src="{{asset('assets/admin/plugins/switchery/switchery.min.js')}}"></script>
	        <script src="{{asset('assets/admin/plugins/datatables/js/jquery.datatables.min.js')}}"></script>
	        <script src="{{asset('assets/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
	        <script src="{{asset('assets/admin/js/ecaps.min.js')}}"></script>
	        <script src="{{asset('assets/admin/js/pages/table-data.js')}}"></script>
        @endif
        @if($page=='album')
                <script src="{{asset('assets/admin/plugins/gridgallery/js/imagesloaded.pkgd.min.js')}}"></script>
                <script src="{{asset('assets/admin/plugins/gridgallery/js/masonry.pkgd.min.js')}}"></script>
                <script src="{{asset('assets/admin/plugins/gridgallery/js/classie.js')}}"></script>
                <script src="{{asset('assets/admin/plugins/gridgallery/js/cbpgridgallery.js')}}"></script>
                <script src="{{asset('assets/admin/js/pages/gallery.js')}}"></script>
                
        @endif
        <script src="{{asset('assets/admin/js/ecaps.min.js')}}"></script>
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js" integrity="sha512-c3Nl8+7g4LMSTdrm621y7kf9v3SDPnhxLNhcjFJbKECVnmZHTdo+IRO05sNLTH/D3vA6u1X32ehoLC7WFVdheg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script> const APP_URL = "{{env('APP_URL')}}"; </script>
        <script src="assets/js/scripts.js" type="application/javascript"></script>
        <!-- <script>
            const WebSocket = require("ws");
        </script> -->



        
        <!-- <script src="assets/js/pages/dashboard.js"></script> -->
       