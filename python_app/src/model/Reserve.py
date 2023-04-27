import csv


class Reserve:

    def __init__(self, id_user, id_menu, date):
        self.id_user = id_user
        self.id_menu = id_menu
        self.date = date


    def print(self):
        print(self.id_user, self.id_menu, self.date)



