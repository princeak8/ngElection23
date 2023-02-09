 <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
 <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
 <link href="{{asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{asset('assets/admin/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/plugins/icomoon/style.css')}}" rel="stylesheet">
        @if($page!='home') 
        		<link href="{{asset('assets/admin/plugins/uniform/css/default.css')}}" rel="stylesheet"/>
        		<link href="{{asset('assets/admin/plugins/switchery/switchery.min.css')}}" rel="stylesheet"/>
        @endif
        <!-- Theme Styles -->
        <link href="{{asset('assets/admin/css/ecaps.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet">
        <script type="application/javascript" src="{{asset('assets/tinymce/tinymce.min.js')}}"></script>
        @vite('resources/css/app.css')
        <!-- <link href="{{env('APP_URL').'/resources/css/app.css'}}" rel="stylesheet"> -->
   
