// Variables
let myVar = "Amir";

// If-else
if (myVar.length < 5) {
    myVar += " Hossein";
} else if (myVar.length < 10) {
    myVar += " Hassan"
} else {
    myVar = "Alireza";
}

// Creating object
var myInfo = {
    name: myVar
}

// Switch case
var day;

switch (new Date().getDay()) {
    case 0:
        day = "Monday";
        break;
    case 1:
        day = "Thuseday";
        break;
    case 2:
        day = "Wednesday";
        break;
    case 3:
        day = "Thursday";
        break;
    case 4:
        day = "Friday";
        break;
    case 5:
        day = "Starday";
        break;
    case 6:
        day = "Sunday";
        break;
    default:
        break;
}

myInfo['sign_up_day'] = day;

// Function
function getToConsole(obj) {
    for (let key in obj) {
        console.log(key + " : " + obj[key]);
    }
}

getToConsole(myInfo);

// Arrays
let users = [];

for (let i = 0; i < 10; i++) {
    users.push(myInfo);
}

console.log(users);