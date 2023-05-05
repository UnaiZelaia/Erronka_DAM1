class Person:
    def __init__(self):
        self.Id = int(input("Enter the ID of the person: "))
        self.name = input("Enter name of the person: ")
        self.surname = input("Enter the surname of the person: ")

    def get_Id(self):
        return self.Id

    def get_name(self):
        return self.name

    def get_surname(self):
        return self.surname

    # setter method
    def Id(self):
        self.Id = int(input("Enter the ID of the person: "))

    def name(self):
        self.name = input("Enter name of the person: ")

    def surname(self):
        self.surname = input("Enter the surname of the person: ")
