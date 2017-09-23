var count = 1;

function increment(){
    count++;
    document.getElementById('number-items').value = count;
}

function decrement(){
    count--;
    if (count<1){
        count = 1;
    }
    document.getElementById('number-items').value = count;
}

document.getElementById('number-items').value = count;
