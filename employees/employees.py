import pickle
from person import *
class Employee(Person):

    def __init__(self):
        super().__init__()
        self.position =  input("enter employee position  ")
        self.salary =  int(input("enter employee salary  "))
        
    
    def get_position(self):
        return self.position
    
    def get_salary(self):
        return self.salary
    
    def position(self):
        self.position = input("enter employee position  ")
        
    def salary(self):
        self.salary = int(input("enter employee salary  "))

    def print(self):
        print(self.Id ,self.name, self.surname, self.position ,self.salary)
            


