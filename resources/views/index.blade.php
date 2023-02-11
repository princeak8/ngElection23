<html>
    <head>
        <title>Election</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        @vite('resources/css/app.css')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.3/axios.min.js" integrity="sha512-L4lHq2JI/GoKsERT8KYa72iCwfSrKYWEyaBxzJeeITM9Lub5vlTj8tufqYk056exhjo2QDEipJrg6zen/DDtoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script> const APP_URL = "{{env('APP_URL')}}"; </script>
        <script src="assets/js/scripts.js" type="application/javascript"></script>
        <link rel="stylesheet" href="assets/css/style.css" />
    </head>
    <body>
        <div id="main-wrapper" class="w-full h-full px-6">
            <div class="flex flex-row w-full">
                <div v-bind:class="{'red-bg': !wsConnected, 'green-bg': wsConnected}" style="width:20px; height:20px"></div>
                <div v-if="!firstUpdate" class="ml-2 alert alert-danger">Loading data...</div>
            </div>
            <div class="flex justify-center h-[15%]" id="top-bar">
                <div class="w-[50%] flex justify-between" id="top-bar-centered">
                    
                    
                    <!-- Default display till vue and data is loaded from axios -->
                    <div :class="{'hide': firstUpdate}" class="w-[20%] flex flex-col justify-center h-[100%]">
                        <p class="text-center">LP</p>
                        <div style="height: clamp(0.5rem, 0.5vw, 5rem); border:thin solid #000">
                            <image src="images/peter obi.jpg" class="w-[90%] mx-[5%]" />
                        </div>
                    </div>
                    <div :class="{'hide': firstUpdate}" class="w-[20%] flex flex-col justify-center h-[100%]">
                        <p class="text-center">PDP</p>
                        <image src="images/atiku.jpg" class="w-[90%] h-[80%] mx-[5%]" />
                    </div>
                    <div :class="{'hide': firstUpdate}" class="w-[20%] flex flex-col justify-center h-[100%]">
                        <p class="text-center">APC</p>
                        <image src="images/tinibu.jpg" class="w-[90%] h-[80%]" />
                    </div>
                    <!-- End of Default display -->

                    <div v-cloak v-for="candidate in results" class="w-[20%] flex flex-col justify-center h-[100%]">
                        <p class="text-center">@{{candidate.party.name}}</p>

                        <image :src="'images/'+candidate.candidate_photo" class="w-[90%] mx-[5%]" style="height: clamp(1rem, 8vw, 5rem);" />
                        <!-- <image src="images/peter obi.jpg" class="w-[90%] h-[80%] mx-[5%]" /> -->
                    </div>

                    <div class="w-[20%] flex flex-col justify-center h-[100%]">
                        <p class="text-center w-[100%] fontSize">OTHERS</p>
                        <image src="images/inec.png" class="w-[90%] h-[80%]" style="height: clamp(1rem, 8vw, 5rem);" />
                    </div>

                    
                    
                </div>
            </div>

            <div class="flex flex-row">
                <div class="w-[75%] flex flex-col">
                    <div class="flex flex-row my-2">
                        <p class="w-[33.3333%] fontSize-2"><b>Total Votes:</b></p>
                        <div class="w-[66.6667%] flex flex-row justify-between">

                            <p v-cloak v-for="result in results" class="w-[20%] fontSize-2 text-center">@{{result.votes.toLocaleString('en-US')}}</p>

                            <!-- Default display till vue and data is loaded from axios -->
                            <p :class="{'hide': firstUpdate}" class="w-[20%] fontSize-2 text-center">0</p>
                            <p  :class="{'hide': firstUpdate}" class="w-[20%] fontSize-2 text-center">0</p>
                            <p  :class="{'hide': firstUpdate}" class="w-[20%] fontSize-2 text-center">0</p>
                            <p  :class="{'hide': firstUpdate}" class="w-[20%] fontSize-2 text-center">0</p>
                            <!-- End of Default display -->


                            <p v-if="firstUpdate" v-cloak class="w-[20%] fontSize-2 text-center">@{{total.others.toLocaleString('en-US')}}</p>
                        </div>
                    </div>
                    <div class="flex flex-row my-2">
                        <p class="w-[33.3333%] fontSize-2"><b>States with 25%:</b></p>
                        <div class="w-[66.6667%] flex flex-row justify-between">
                            
                            <p v-cloak v-for="result25 in results" class="w-[20%] text-center fontSize-2">@{{result25.states}}</p>
                            
                             <!-- Default display till vue and data is loaded from axios -->
                            <p :class="{'hide': firstUpdate}" class="w-[20%] text-center fontSize-2">0</p>
                            <p :class="{'hide': firstUpdate}" class="w-[20%] text-center fontSize-2">0</p>
                            <p :class="{'hide': firstUpdate}" class="w-[20%] text-center fontSize-2">0</p>
                            <!-- End of Default display -->

                            <p class="w-[20%] text-center fontSize-2"></p>
                        </div>
                    </div>
                    <div class="flex flex-row my-2">
                        <p class="w-[33.3333%] fontSize-2"><b>% of Victory:</b></p>
                        <div class="w-[66.6667%] flex flex-row justify-between">
                            <p class="w-[20%] text-center fontSize-2">0</p>
                            <p class="w-[20%] text-center fontSize-2">0</p>
                            <p class="w-[20%] text-center fontSize-2">0</p>
                            <p class="w-[20%] text-center"></p>
                        </div>
                    </div>

                </div>
                <!-- <div class="w-[25%] flex justify-end">
                    <p class=" fontSize-2">% of Run-Off</p>
                </div> -->
            </div>

            <!-- Race to presidency -->
            <div class="my-1">
                <p class="text-lg font-semibold text-center w-full fontSize-2">RACE TO PRESIDENCY</p>
                <div class="mt-2 flex flex-row">
                    <div class="w-[75%] flex flex-col ml-2">
                        <div class="flex flex-row">
                            <div class="w-[5%] h-[80%]" >
                                <image src="images/LP.png" class="w-[100%] h-full" />
                            </div>
                            <div class="w-[95%] flex mt-[1.5%]">
                                <div class="w-[20%] h-[25%] bg-[#00923F] rounded"></div>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="w-[5%] h-[80%]" >
                                <image src="images/APC.png" class="w-[100%] h-full" />
                            </div>
                            <div class="w-[95%] flex mt-[1.5%]">
                                <div class="w-[20%] h-[25%] bg-[#5EC2E5] rounded"></div>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="w-[5%] h-[80%]" >
                                <image src="images/PDP.png" class="w-[100%] h-full" />
                            </div>
                            <div class="w-[95%] flex mt-[1.5%]">
                                <div class="w-[20%] h-[25%] bg-[#ED3237] rounded"></div>
                            </div>
                        </div>
                    </div>
                    <!-- The price -->
                    <div class="w-[25%] m-0" style="height: clamp(1rem, 10vw, 20rem);"><image src="images/presidency.jpg" class="w-[100%] h-full" /></div>
                </div>
            </div>

            <!-- table -->
            <div>
                <table class="table w-full border-r-2">
                    <tr class="h-[6vh]">
                        <td class="text-center border-r-2 border-t-2 fontSize-3">STATE</td>
                        <td class="text-center border-r-2 border-t-2 fontSize-3">REGISTERED</td>
                        <td class="text-center border-r-2 border-t-2 fontSize-3">ACCREDITATED</td>
                        <td class="text-center border-r-2 border-t-2 fontSize-3">INVALID</td>
                        <td class="text-center border-r-2 border-t-2 fontSize-3">VALID VOTES</td>
                        <td class="text-center border-r-2 border-t-2 fontSize-3">RESULTS</td>
                        <td class="text-center border-r-2 border-t-2 fontSize-3">WINNER</td>
                    </tr>
                    <tr v-for="state in states">
                        <td class="text-center border-r-2 fontSize-3"><span v-cloak>@{{state.name}}</span></td>
                        <td class="text-center border-r-2 fontSize-3"><span v-cloak>@{{format(state.registered)}}</span></td>
                        <td class="text-center border-r-2 fontSize-3"><span v-cloak>@{{format(state.accreditated)}}</span></td>
                        <td class="text-center border-r-2 fontSize-3"><span v-cloak>@{{format(state.invalid)}}</span></td>
                        <td class="text-center border-r-2 fontSize-3"><span v-cloak>@{{format(state.valid)}}</span></td>
                        <td class="text-center border-r-2 fontSize-3">
                            <p class="w-full text-center"><span>LP:</span> <span v-cloak>@{{format(state.result.LP)}}</span></p>
                            <p class="w-full text-center"><span>APC:</span> <span v-cloak>@{{format(state.result.APC)}}</span></p>
                            <p class="w-full text-center"><span>PDP:</span> <span v-cloak>@{{format(state.result.PDP)}}</span></p>
                        </td>
                        <td class="text-center justify-center">
                            <span v-cloak>
                                <image v-if="state.winner" :src="'images/'+state.winner.logo" style="height: clamp(0.5rem, 3vw, 3rem); margin-right:auto; margin-left: auto; margin-top:clamp(0.5rem, 0.5vw, 1rem);" />
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script>
        const { ref, onMounted }  = Vue;

        const { createApp } = Vue
        // const websocket = require(['websocket/lib/websocket.js']);
        

        createApp({
            setup() {
                let message = ref('Hello Vue!');
                let results = ref([]);
                let states = ref([]);
                let parties = [];
                let total = ref([]);
                let wss = ref('');
                let wsConnected = ref(false);
                let firstUpdate = ref(false);

                function format(val) {
                    // remove sign if negative
                    var sign = 1;
                    if (val < 0) {
                        sign = -1;
                        val = -val;
                    }
                    // trim the number decimal point if it exists
                    let num = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();
                    let len = num.toString().length;
                    let result = '';
                    let count = 1;

                    for (let i = len - 1; i >= 0; i--) {
                        result = num.toString()[i] + result;
                        if (count % 3 === 0 && count !== 0 && i !== 0) {
                        result = ',' + result;
                        }
                        count++;
                    }

                    // add number after decimal point
                    if (val.toString().includes('.')) {
                        result = result + '.' + val.toString().split('.')[1];
                    }
                    // return result with - sign if negative
                    return sign < 0 ? '-' + result : result;
                }

                function connectWs() {
                    // wss.value = new WebSocket("ws://localhost:5000");
                    let protocol = (window.location.protocol === 'https:') ? 'wss' : 'ws'
                    wss.value = new WebSocket(protocol+"://election-api.zizix6host.com");
                    wss.value.onmessage = (msg) => {
                        // console.log('msg', msg);
                        let res = '';
                        try{
                            res = JSON.parse(msg.data);
                        }catch(e) {
                            res = msg.data;
                        }
                        console.log('res:', res);
                        // console.log('states:', states)
                        if(res.type=='single') handleSinglePayload(res.data);
                        if(res.type=='update') handlePayload(res.data);
                    };

                    wss.value.onerror = (error) => {
                        wsConnected.value = false;
                        console.log("Error ", error);
                        connectWs();
                    };
                    wss.value.onclose = async (event) => {
                        wsConnected.value = false;
                        // console.log("WebSocket is closed now.", event);
                        // await wait(5000);
                        connectWs();
                    };
                    // wss.value.onclose=wss.value.open;

                    wss.value.onopen = function () {
                        console.log('connection opened');
                        wsConnected.value = true;
                        // update()
                        // heartbeat();
                    }
                }
                async function updateData(dbResults) {
                    // if(wsConnected.value && "WebSocket" in window) {
                    //     wss.value.send('update');
                    //     updateCount++
                    //     console.log('update count', updateCount);
                    // }
                    try{
                        // let dbResults = await getResults();
                        // console.log('results retrieved');
                        if(dbResults.length > 0) {
                            let allStates = states.value;
                            dbResults.forEach((dbResult) => {
                                console.log('dbResult',dbResult);
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
                                state[0].winner = dbResult.winner;
                            })
                        }
                    }catch(e) {
                        console.log('Error occured while attempting to update data: ',e);
                        updateData();
                    }
                }
                function handleSinglePayload(data)
                {
                    console.log('single data:', data.valid);
                    let allStates = states.value;
                    StateTransmitted = allStates.filter((state) => state.id == data.stateId)
                    StateTransmitted[0].registered = data.registered;
                    StateTransmitted[0].accreditated = data.accreditated;
                    StateTransmitted[0].invalid = data.invalid;
                    StateTransmitted[0].valid = data.valid;
                    StateTransmitted[0].result = data.result;
                    let winner = getWinner(data.result);
                    console.log('winner: ', winner);
                    if(winner) StateTransmitted[0].winner = winner;

                    calculate();
                }
                function handlePayload(data) 
                {
                    data.forEach((sentState) => {
                        handleSinglePayload(sentState);
                    })
                }
                function getWinner(results) {
                    console.log('parties', parties);
                    //Set the highest vote
                    let highest = 0;
                    let party = '';
                    if(Object.keys(results).length >= 3) {
                        Object.keys(results).forEach((prty) => {
                            if(highest < parseInt(results[prty])) {
                                highest = parseInt(results[prty]);
                                party = prty;
                            }
                        })
                        winnerParty = parties.filter((pty)=> pty.name==party);
                        console.log('winner party', winnerParty);
                        if(winnerParty.length > 0) return winnerParty[0];
                    }else{
                        console.log('result incomplete', Object.keys(results).length);
                    }
                    return false;
                }
                function calculate() {
                    console.log('calculating..');
                    // console.log('results', results.value);
                    let totalResult = {};
                    let states25 = {};
                    states.value.forEach((state) => {
                        // console.log('party', state.result);
                        let valid = parseInt(state.valid);
                        let winner = {highest: 0, party: ''};
                        Object.keys(state.result).forEach((party) => {
                            // console.log('state result', state.result[party]);
                            if(typeof totalResult[party]==='undefined') {
                                totalResult[party] = 0;
                                states25[party] = 0;
                            }
                            totalResult[party] += parseInt(state.result[party]);
                            let percentage = (valid > 0 && valid > parseInt(state.result[party])) ? (parseInt(state.result[party])/valid) * 100 : 0;
                            if(percentage >= 25) states25[party]++;
                        })

                        
                    })
                    console.log('25%', states25);
                    console.log('total', totalResult);

                    //Assign the total for each party
                    Object.keys(totalResult).forEach((party) => {
                        results.value.forEach((pr) => {
                            if(pr.party.name==party) {
                                // console.log(party+' = '+totalResult[party]);
                                pr.votes = totalResult[party];
                            }
                        });
                    })

                    //Assign the states with 25% for each party
                    Object.keys(states25).forEach((party) => {
                        let state25 = results.value.filter((pr) => pr.party.name==party);
                        state25[0].states = states25[party];
                    })
                    // results.value.forEach((pr) => {
                    //     Object.keys(pr.party).forEach((key) => console.log(key))
                    //     // pr.party.states = 0;
                    // });
                    // console.log('total Result:', totalResult);
                }
                function heartbeat() {
                        wss.value.send("heartbeat");
                        // console.log('heartbeat sent');
                        setInterval(heartbeat, 1000);
                }
                function wait(ms) {
                    return new Promise((resolve) => {
                        console.log("waiting " + ms / 1000 + " Secs");
                        setTimeout(resolve, ms);
                    });
                }
                async function retrieveCombinedData() {
                    let combinedData = await getCombinedData();
                    states.value = combinedData.dbStates;
                    results.value = combinedData.totalResults;
                    total.value = combinedData.total;
                    parties = combinedData.dbParties;
                    updateData(combinedData.dbStateResults);
                    firstUpdate.value = true;
                }
                onMounted( async () => {
                    console.log('connect to ws');
                    // new WebSocket("ws://election-api.zizix6host.com");
                    connectWs();
                    try{
                        await retrieveCombinedData();
                    }catch(e) {
                        console.log('API call failed...'+e.message);
                        await retrieveCombinedData();
                    }
                    setInterval(async ()=>{
                        let dbResults = await getResults();
                        updateData(dbResults)
                    }, 50000)
                    // var wss = new WebSocket("ws://localhost:5000");
                    
                })

                return { results, states, total, parties, wsConnected, firstUpdate, format }
            }
        }).mount('#main-wrapper')
    </script>
</html>

    