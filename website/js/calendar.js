let date = new Date;

function setWeekDays() {
    let dayOfWeek = date.getDay();
    let dayOfMonth = date.getDate();
    let month = date.getMonth();
    let d = dayOfMonth;
    let week = [0, 0, 0, 0, 0];

    if (dayOfWeek >= 0) {
        let weekDayLoop = dayOfWeek;
        let monthDayLoop = dayOfMonth + 1;

        while (weekDayLoop >= 0) {
            if (monthDayLoop < 1) {
                if (month % 2 != 0) {
                    monthDayLoop = 31;
                }
                else if (month == 2) {
                    monthDayLoop = 28;
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
            if (monthDayLoop <= 28) {
                week[weekDayLoop] = monthDayLoop;
                weekDayLoop++;
                monthDayLoop++;
            }
            else {
                week[weekDayLoop] = monthDayLoop;
                weekDayLoop++;
                monthDayLoop++;
            }
        }
        else {
            if (monthDayLoop <= 30) {
                week[weekDayLoop] = monthDayLoop;
                weekDayLoop++;
                monthDayLoop++;
            }
            else {
                week[weekDayLoop] = monthDayLoop;
                weekDayLoop++;
                monthDayLoop++;
            }
        }
    }
    return week;
}


function setHtmlWeek(){
    week = setWeekDays();

    document.getElementById("weekMon").append(week[0]);
    document.getElementById("weekTue").append(week[1]);
    document.getElementById("weekWed").append(week[2]);
    document.getElementById("weekThu").append(week[3]);
    document.getElementById("weekFri").append(week[4]);
}

