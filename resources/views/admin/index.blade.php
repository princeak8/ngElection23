@extends('layouts.admin', ['page'=>'home'])
        
@section('content')
            
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="search-form">
                        <form action="#" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    @include('inc.admin.navbar')
                </div><!-- /Page Header -->
                <!-- Page Inner -->
                <div class="page-inner">
                    <div class="page-title">
                        <h3 class="breadcrumb-header">Dashboard</h3>
                        <a href="javascript:void(0)" data-birdsend-form="21381">Click to subscribe</a>
                    </div>
                    <div id="main-wrapper">
                        <div class="row">
                            <div class="col-lg-2 col-md-4">
                                <div class="panel panel-white stats-widget">
                                    <a href="{{ url('admin/states') }}">
                                        <div class="panel-body">
                                            <div class="pull-left">
                                                <span class="stats-number"></span>
                                                <p class="stats-info">States</p>
                                            </div>
                                            <!-- <div class="pull-right">
                                                <i class="icon-arrow_upward stats-icon"></i>
                                            </div> -->
                                        </div>
                                    </a>
                                </div>
                            </div>
                            
                            
                            
                            
                        </div><!-- Row -->

                        <table class="w-full justify-center" style="width: 100%;">
                            <colgroup>
                                <col span="1" style="width: 5%;">
                                <col span="1" style="width: 10%;">
                                <col span="1" style="width: 10%;">
                                <col span="1" style="width: 10%;">
                                <col span="1" style="width: 10%;">
                                <col span="1" style="width: 10%;">
                                <col span="1" style="width: 35%;">
                                <col span="1" style="width: 10%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="text-center">S/N</th>
                                    <th class="text-center">STATE</th>
                                    <th class="text-center" style="width: 5%">REGISTERED</th>
                                    <th class="text-center">ACCREDITATED</th>
                                    <th class="text-center">INVALID</th>
                                    <th class="text-center">VOTED</th>
                                    <th class="text-center">RESULT</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(state, i) in states" class="w-full border-t-2">
                                    <td class="text-center">@{{i+1}}</td>
                                    <td class="text-center">@{{state.name}}</td>
                                    <td class="text-center w-[15%]"><input type="number" class="border-2 h-12 text-center"  v-model="state.registered" /></td>
                                    <td class="text-center"><input type="number" class="border-2 h-12 text-center" v-model="state.accreditated" /></td>
                                    <td class="text-center"><input type="number" class="border-2 h-12 text-center" v-model="state.invalid" /></td>
                                    <td class="text-center"><input type="number" class="border-2 h-12 text-center" v-model="state.valid" /></td>
                                    <td class="text-center mt-2" style="margin-top: 10px;">
                                        <p class="flex flex-row" v-for="party in parties">
                                            <span class="w-1/3">@{{party.name}}:</span> <input type="number" class="border-2 h-8 w-2/3 text-center" v-model="state.result[party.name]" />
                                        </p>
                                    </td>
                                    <td class="text-center"><button class="btn btn-success" @click="save(i)">SAVE</button></td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div><!-- Main Wrapper -->

@endsection

@section('js')
    
    <script>
        const { ref, onMounted }  = Vue;

        const { createApp } = Vue
        // const websocket = require(['websocket/lib/websocket.js']);
        

        createApp({
            setup() {
                let message = ref('Hello Vue!');
                let states = ref([]);
                let parties = ref([]);
                let wss = ref('');
                let dbResults = [];
                let wsOpened = ref(false);
                function connectWs() {
                    // wss.value = new WebSocket("ws://localhost:5000");
                    wss.value = new WebSocket("ws://election-api.zizix6host.com");

                    wss.value.onopen = function () {
                        console.log('connection opened');
                        wsOpened.value = true;
                        // heartbeat();
                    }

                    wss.value.onmessage = (msg) => {
                        console.log('on message triggered')
                        if(msg.data == 'update') {
                            update();
                        }
                    };

                    wss.value.onclose = async (event) => {
                        console.log("WebSocket is closed now.", event);
                        // await wait(5000);
                        wsOpened.value = false;
                        connectWs();
                    };

                    wss.value.onerror = (error) => {
                        console.log("Error ", error);
                        wsOpened.value = false;
                        connectWs();
                    };
                }
                function heartbeat() {
                    wss.value.send("heartbeat");
                    // console.log('heartbeat sent');
                    setInterval(heartbeat, 1000);
                }
                function update()
                {
                    console.log('updating');
                    let allStates = [];
                    states.value.forEach((state) => {
                        allStates.push({
                            "stateId": state.id,
                            "state": state.name,
                            "registered": state.registered,
                            "accreditated": state.accreditated,
                            "invalid": state.invalid,
                            "valid": state.valid,
                            "result": {
                                "LP": state.result.LP,
                                "APC": state.result.APC,
                                "PDP": state.result.PDP
                            }
                        });
                    });
                    let payload = {
                        "type" : 'update',
                        "data" : allStates
                    }
                    if ("WebSocket" in window) {
                        wss.value.send(JSON.stringify(payload));
                        console.log(payload);
                    }else{
                        console.log('websocket not in window');
                    }
                }
                function save(i) {
                    let state = states.value[i];
                    saveResult(state);
                    console.log(state.name);
                    let data = {
                            "stateId": state.id,
                            "state": state.name,
                            "registered": state.registered,
                            "accreditated": state.accreditated,
                            "invalid": state.invalid,
                            "valid": state.valid,
                            "result": {
                                "LP": state.result.LP,
                                "APC": state.result.APC,
                                "PDP": state.result.PDP
                            }
                    };
                    let payload = {
                        "type" : 'single',
                        "data" : data
                    }
                    
                    if ("WebSocket" in window) {
                        console.log('connection status:', wsOpened.value);
                        if(wsOpened.value) {
                            console.log('data: ',data);
                            // wss.value.onopen = function () {
                            //     console.log("Connection opened...");
                            //     wss.value.send("Hi, from the client."); // this works
                            // };
                            wss.value.send(JSON.stringify(payload));
                            console.log(payload)

                            // ws.onmessage = function (event) {
                            //         alert("Message received..." + event.data);
                            // };

                            // ws.onclose = function () {
                            //     alert("Connection closed...");
                            // };
                        }else{
                            console.log('Connection is not open');
                        }
                    }else{
                        console.log('websocket not in window');
                    }
                    
                }
                function retrieveFromStorage() {
                    let storageStates = getStatesFromStorage();
                    console.log('storage states:', storageStates);
                    if(storageStates) {
                        let allStates = states.value;
                        storageStates.forEach((storageState) => {
                            state = allStates.filter((st) => st.id == storageState.id)
                            state[0].registered = storageState.registered;
                            state[0].accreditated = storageState.accreditated;
                            state[0].invalid = storageState.invalid;
                            state[0].valid = storageState.valid;
                            state[0].result = storageState.result;
                        })
                    }
                }
                async function retrieveFromDB() {
                    let dbResults = await getResults();
                    if(dbResults.length > 0) {
                        let allStates = states.value;
                        dbResults.forEach((dbResult) => {
                            let state = allStates.filter((st) => st.id == dbResult.state_id);
                            let result = {};
                            dbResult.result.forEach((dbr) => {
                                Object.keys(dbr).forEach((key) => result[key] = dbr[key]);
                            });
                            
                            state[0].registered = dbResult.registered;
                            state[0].accreditated = dbResult.accreditated;
                            state[0].invalid = dbResult.invalid;
                            state[0].valid = dbResult.valid;
                            state[0].result = result;
                        })
                    }
                    saveStatesToLoacalStorage(states.value, true);
                }
                onMounted(async () => {
                    connectWs();
                    states.value = await getStates();
                    // (!retrieveFromStorage())?? await retrieveFromDB();
                    await retrieveFromDB();
                    saveStatesToLoacalStorage(states.value);
                    parties.value = await getParties();
                    // var wss = new WebSocket("ws://localhost:5000");
                })
                return { states, parties, save }
            }
        }).mount('#main-wrapper')
    </script>
@endsection