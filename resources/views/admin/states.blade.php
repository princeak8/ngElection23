@extends('layouts.admin', ['page'=>'states'])
        
@section('content')
            
    <!-- Page Content -->
    <div class="page-content">
        <!-- Page Header -->
        <div class="page-header">

            @include('inc.admin.navbar')

        </div><!-- /Page Header -->
        <!-- Page Inner -->
        <div class="page-inner">
            <div class="page-title">
                <h3 class="breadcrumb-header">
                    STATES
                </h3>
            </div>
            
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel-white stats-widget">
                            <table id="example" class="display table w-1/3 panel-body justify-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">S/N</th>
                                        <th class="text-center">NAME</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(state, i) in states">
                                        <td class="text-center">@{{i+1}}</td>
                                        <td class="text-center">@{{state.name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- Row -->
                        
            </div><!-- Main Wrapper -->

@endsection

@section('js')
    <script>
        const { ref, onMounted }  = Vue;

        const { createApp } = Vue

        createApp({
            setup() {
                let message = ref('Hello Vue!');
                let states = ref('');
                function getStates() {
                    let url = "{{env('APP_URL')}}/api/states/all";
                    axios.get(url)
                    .then(res => {
                        console.log('res:',res.data);
                        if(res.data.statusCode == 200) {
                            states.value = res.data.data;
                        }else{
                            console.log('error', res.data.message);
                        }
                    })
                    .catch(error => {
                        console.log("error",error.message);
                        
                    });
                }
                onMounted(() => {
                    getStates();
                })
                return { states }
            }
        }).mount('#main-wrapper')
    </script>
@endsection