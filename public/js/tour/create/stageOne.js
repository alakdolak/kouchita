var tourKind = [];
var tourDifficult = [0];
var tourDifficultChoose = [0];

function changeKindColorToHover(_i){
    document.getElementById('tourKind' + _i).style.backgroundColor = 'rgb(77, 199, 188)';
}

function changeColorToLeave(_i) {
    document.getElementById('tourKind' + _i).style.backgroundColor = '';
}

function chooseTourKind(_i, _id){
    if(tourKind.includes(_id)){
        document.getElementById('tourKind' + _i).classList.remove('chooseTourKind');
        index = tourKind.indexOf(_id);
        tourKind[index] = 'none';
    }
    else{
        document.getElementById('tourKind' + _i).classList.add('chooseTourKind');
        if(tourKind.includes('none')){
            index = tourKind.indexOf('none');
            tourKind[index] = _id;
        }
        else{
            tourKind.push(_id);
        }
    }

    document.getElementById('kind').value = JSON.stringify(tourKind);
}

function chooseDifficult(_i, _id, _type){

    if(_type == 0){
        var firstZero = 0;
        var end = 1;

        for(i = 1; i < tourDifficult.length; i++){
            if(firstZero == 0 && tourDifficult[i] == 0)
                firstZero = i;

            if(tourDifficult[i] == _id){
                document.getElementById('tourDifficult' + tourDifficultChoose[i]).classList.remove('chooseTourKind');
                tourDifficult[i] = 0;
                tourDifficultChoose[i] = 0;
                end = 0;
            }
        }

        if(firstZero == 0 && end){
            document.getElementById('tourDifficult' + _i).classList.add('chooseTourKind');
            tourDifficult.push(_id);
            tourDifficultChoose.push(_i);
        }
        else if(end){
            tourDifficult[firstZero] = _id;
            tourDifficultChoose[firstZero] = _i;
            document.getElementById('tourDifficult' + _i).classList.add('chooseTourKind');
        }

    }
    else{
        // for first time
        if(tourDifficult[0] == 0){
            tourDifficult[0] = _id;
            tourDifficultChoose[0] = _i;
            document.getElementById('tourDifficult'+_i).classList.add('chooseTourKind');
        }
        else{
            document.getElementById('tourDifficult' + tourDifficultChoose[0]).classList.remove('chooseTourKind');
            tourDifficult[0] = _id;
            tourDifficultChoose[0] = _i;
            document.getElementById('tourDifficult'+_i).classList.add('chooseTourKind');
        }
    }
}
