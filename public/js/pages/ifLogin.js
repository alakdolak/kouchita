
async function getMyTripsPromiseFunc(){
    var getMyTripsPromise = new Promise((myResolve, myReject) => {
        $.ajax({
            type: 'GET',
            url: window.GetMyTripsUrl,
            success: response => {
                if(response.status == 'ok')
                    myResolve(response.result);
                else
                    myReject(response.result);
            },
            error: err => myReject(err)
        })
    });

    return await getMyTripsPromise;
}

