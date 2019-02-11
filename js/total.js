/*
Blackburn, Sydney
CS545_00
Assignment #4
Fall 2018
*/

/* VARIABLES */

var underFive = 0;
var fiveToTwelve = 0;
var thirteenToSeventeen = 0;
var overSeventeen = 0;
var total = 0;


/* FUNCTIONS */

function checks(num) {
    // Check that getElementById function is supported
    if (!document.getElementById) return;
    
    // Check that a number is being passed and not empty
    if (num == "" || !Number.isInteger(parseInt(num))) num = 0;
    
    return parseInt(num);
}

// Check that a number is passed and update attendee total
function underFiveChange(num) {
    underFive = checks(num);
    totalAttendees();
}

// Check that a number is passed and update attendee total
function fiveToTwelveChange(num) {
    fiveToTwelve = checks(num);
    totalAttendees();
}

// Check that a number is passed and update attendee total
function thirteenToSeventeenChange(num) {
    thirteenToSeventeen = checks(num);
    totalAttendees();
}

// Check that a number is passed and update attendee total
function overSeventeenChange(num) {
    overSeventeen = checks(num);
    totalAttendees();
}

function totalAttendees() {
    // Calculate running total
    total = underFive + fiveToTwelve + thirteenToSeventeen + overSeventeen;
    document.getElementById("total").innerHTML = "Total Number of Attendees: " + total;
}
