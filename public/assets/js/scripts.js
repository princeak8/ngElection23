// console.log('this is here', APP_URL);

async function getCombinedData() 
{
    let url = APP_URL+"/api/combined_data";
    console.log('getting combined data');
    return await axios.get(url)
    .then(res => {
        // console.log('res:',res.data);
        if(res.data.statusCode == 200) {
            let { parties, stateResults, totalResults, states, total } = res.data.data;
            dbStates = prepareStates(states);
            dbParties = prepareParties(parties);
            dbStateResults = prepareStatesResults(stateResults)
            return {dbStates, dbParties, dbStateResults, totalResults, total};
        }else{
            console.log('error', res.data.message);
        }
    })
    .catch(error => {
        console.log("error",error.message);
        
    });
}

async function getStates() {
    let url = APP_URL+"/api/states/all";
    let states = [];
    await axios.get(url)
    .then(res => {
        // console.log('res:',res.data);
        if(res.data.statusCode == 200) {
            res.data.data.forEach((stateObj) => {
                let newState = {
                    id: stateObj.id,
                    name: stateObj.name,
                    registered: 0,
                    accreditated: 0,
                    invalid: 0,
                    valid: 0,
                    result: {
                        LP: 0,
                        PDP: 0,
                        APC: 0
                    },
                    winner: {
                        name: '',
                        logo: ''
                    }
                };
                states.push(newState);
            });
        }else{
            console.log('error', res.data.message);
        }
    })
    .catch(error => {
        console.log("error",error.message);
        
    });
    return states;
}

function prepareStates(dbStates) {
    let states = [];
    dbStates.forEach((stateObj) => {
        let newState = {
            id: stateObj.id,
            name: stateObj.name,
            registered: 0,
            accreditated: 0,
            invalid: 0,
            valid: 0,
            result: {
                LP: 0,
                PDP: 0,
                APC: 0
            },
            winner: ''
        };
        states.push(newState);
    });
    return states;
}

async function getParties() {
    let url = APP_URL+"/api/party/all";
    let parties = [];
    await axios.get(url)
    .then(res => {
        console.log('parties:',res.data);
        if(res.data.statusCode == 200) {
            res.data.data.forEach((party) => {
                parties.push({
                    'id' : party.id,
                    'name' : party.name
                });
            });
        }else{
            console.log('error', res.data.message);
        }
    })
    .catch(error => {
        console.log("error",error.message);
        
    });
    return parties;
}

function prepareParties(dbParties) {
    let parties = [];
    dbParties.forEach((party) => {
        parties.push({
            'id' : party.id,
            'name' : party.name,
            'logo' : party.logo
        });
    });
    return parties;
}

async function saveResult(state) {
    saveToLocalStorage(state);
    let url = APP_URL+"/admin/result/save";
    var token = $('meta[name="csrf-token"]').attr('content');
    const { registered, accreditated, invalid, valid } = state;
    var results = [];
    // console.log('result', state.result);
    Object.keys(state.result).forEach((key) => {
        results.push({
            party: key,
            votes: state.result[key]
        });
    })
    postData = {_token: token, state_id: state.id, registered, accreditated, invalid, valid, results};
    await axios.post(url, postData)
    .then(res => {
        console.log('saved result:', res);
    })
    .catch(error => {
        console.log("error",error.message);
        
    });
}

async function getResults() {
    let url = APP_URL+"/api/result/all";
    let results = [];
    await axios.get(url)
    .then(res => {
        console.log('results:',res.data);
        if(res.data.statusCode == 200) {
            results = prepareStatesResults(res.data.data);
        }else{
            console.log('error', res.data.message);
        }
    })
    .catch(error => {
        console.log("error",error.message);
        
    });
    return results;
}

function prepareStatesResults(dbStatesResults) {
    let results = [];
    dbStatesResults.forEach((dbResult) => {
        const {state_id, state, registered, accreditated, invalid, valid, result, winner} = dbResult;
        formattedResult = [];
        result.forEach((r) => {
            let partyResult = {};
            partyResult[r.party] = r.votes;
            formattedResult.push(partyResult);
        })
        results.push({
            'state_id' : state_id,
            'state' : state,
            'registered' : registered,
            'accreditated' : accreditated,
            'invalid' : invalid,
            'valid' : valid,
            'result' : formattedResult,
            'winner' : winner
        });
    });
    return results;
}

function saveStatesToLoacalStorage(states, forceSave=false)
{
    if(forceSave || !localStorage['states']) {
        localStorage.setItem('states', JSON.stringify(states));
        console.log('states saved to local storage');
    }
    
}

function saveToLocalStorage(state)
{
    if(localStorage['states']) {
        let storageStates = states = JSON.parse(localStorage['states']);
        storageStates.forEach((st) => {
            if(st.id == state.id){
                st.registered = state.registered;
                st.accreditated = state.accreditated;
                st.invalid = state.invalid;
                st.valid = state.valid;
                st.result = state.result;
            }
        })
        localStorage.setItem('states', JSON.stringify(storageStates));
        console.log('saved state to local storage');
    }
}

function getStatesFromStorage()
{
    return (localStorage['states']) ? JSON.parse(localStorage['states']) : false;
}



