let date = new Date;

function setWeekDays() {
    let dayOfWeek = date.getDay();
    let dayOfMonth = date.getDate();
    let month = date.getMonth();
    let year = date.getFullYear();
    let week = [0, 0, 0, 0, 0];

    let weekDayLoop = dayOfWeek;
    let monthDayLoop = dayOfMonth + 1;

    while (weekDayLoop >= 0) {
        if (monthDayLoop < 1) {
            if (month % 2 != 0) {
                monthDayLoop = 31;
            }
            else if (month == 2) {
                if ((year % 4 == 0 && year % 100 != 0) || year % 400 == 0) {
                    monthDayLoop = 29;
                }
                else {
                    monthDayLoop = 28;
                }
            }
            else {
                monthDayLoop = 30;
            }
        }
        if (weekDayLoop >= 0 && weekDayLoop <= 4) {
            week[weekDayLoop] = monthDayLoop;
        }
        weekDayLoop--;
        monthDayLoop--;
    }

    weekDayLoop = dayOfWeek;
    monthDayLoop = dayOfMonth + 1;

    while (weekDayLoop < 5) {
        if (month % 2 != 0 && month != 1) {
            if (monthDayLoop <= 31) {

                week[weekDayLoop] = monthDayLoop;
                weekDayLoop++;
                monthDayLoop++;
            }
            else {
                monthDayLoop = 1;
                week[weekDayLoop] = monthDayLoop;
                weekDayLoop++;
                monthDayLoop++;
            }
        }
        else if (month == 1) {
            if ((year % 4 == 0 && year % 100 != 0) || year % 400 == 0) {
                if (monthDayLoop <= 29) {
                    week[weekDayLoop] = monthDayLoop;
                    weekDayLoop++;
                    monthDayLoop++;
                }
                else {
                    monthDayLoop = 1;
                    week[weekDayLoop] = monthDayLoop;
                    weekDayLoop++;
                    monthDayLoop++;
                }
            }
            else {
                if (monthDayLoop <= 28) {
                    week[weekDayLoop] = monthDayLoop;
                    weekDayLoop++;
                    monthDayLoop++;
                }
                else {
                    monthDayLoop = 1;
                    week[weekDayLoop] = monthDayLoop;
                    weekDayLoop++;
                    monthDayLoop++;
                }
            }
        }
        else {
            if (monthDayLoop <= 30) {
                week[weekDayLoop] = monthDayLoop;
                weekDayLoop++;
                monthDayLoop++;
            }
            else {
                monthDayLoop = 1;
                week[weekDayLoop] = monthDayLoop;
                weekDayLoop++;
                monthDayLoop++;
            }
        }
    }
    return week;
}


function setHtmlWeek() {
    week = setWeekDays();
    monthWeek = setMonthAndWeek();

    document.getElementById("weekMon").append(week[0]);
    document.getElementById("weekTue").append(week[1]);
    document.getElementById("weekWed").append(week[2]);
    document.getElementById("weekThu").append(week[3]);
    document.getElementById("weekFri").append(week[4]);
    document.getElementById("MonthHeader").append(monthWeek);
    setHiddens();
}


function setMonthAndWeek() {
    let month = date.getMonth();
    let monthName;
    let week = setWeekDays();

    switch (month) {
        case 0:
            monthName = "January";
            break;
        case 1:
            monthName = "February";
            break;
        case 2:
            monthName = "March";
            break;
        case 3:
            monthName = "April";
            break;
        case 4:
            monthName = "May";
            break;
        case 5:
            monthName = "June";
            break;
        case 6:
            monthName = "July";
            break;
        case 7:
            monthName = "August";
            break;
        case 8:
            monthName = "September";
            break;
        case 9:
            monthName = "October";
            break;
        case 10:
            monthName = "November";
            break;
        case 11:
            monthName = "December";
            break;
    }

    let monthWeekString = monthName + " " + week[0] + "-" + week[4];
    return monthWeekString;
}

function setHiddens() {
    let week = setWeekDays();
    var day1 = document.getElementsByClassName("day1");
    var day2 = document.getElementsByClassName("day2");
    var day3 = document.getElementsByClassName("day3");
    var day4 = document.getElementsByClassName("day4");
    var day5 = document.getElementsByClassName("day5");
    var n;
    for (n = 0; n < day1.length; ++n) {
        day1[n].value =week[0];
        day2[n].value = week[1];
        day3[n].value = week[2];
        day4[n].value = week[3];
        day5[n].value = week[4];
    }
}


