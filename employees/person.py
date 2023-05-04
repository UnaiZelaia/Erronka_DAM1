class Person:
    def __init__(self):
        self.Id = int(input("enter person Id  "))
        self.name =  input("enter person name  ") 
        self.surname = input("enter person surname  ")
        

    def get_Id(self):
        return self.Id

    def get_name(self):
        return self.name

    def get_surname(self):
        return self.surname

    # setter method
    def Id(self):
        self.Id = int(input("enter person Id  "))

    def name(self):
        self.name = input("enter person name  ")

    def surname(self):
        self.surname = input("enter person surname  ")

