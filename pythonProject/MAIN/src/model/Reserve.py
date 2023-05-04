import csv
class Reserve:

    def __init__(self, id_user, id_menu, date):
        self.id_user = id_user
        self.id_menu = id_menu
        self.date = date


    def print(self):
        print(self.id_user, self.id_menu, self.date)


    def setDate(self):
        cm = 1
        cd = 1
        year = input("Enter the new year for the reservation: ")
        while cm == 1:
            month = int(input("Enter the new month for the reservation: "))
            if month <= 0 or month > 12:
                print("Wrong month. Plase enter a value between 1 and 12")
            else:
                cm = 2

        while cd == 1:
            day = int(input("Enter the day new for the reservation: "))
            if day <= 0 or day > 32:
                print("Wrong month. Please enter a value between 1 and 12")
            else:
                cd = 2
        date = str(day) + '-' + str(month) + '-' + str(year)
        self.date = date


    def setId_user(self):
        user = input("Enter the new user id(dni) for the reservation")
        self.id_user = user

    def setId_menu(self):
        menu = input("Enter the new menu for the reservation")
        self.id_menu = menu