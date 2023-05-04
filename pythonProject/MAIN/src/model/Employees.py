from MAIN.src.model.Person import Person


class Employee(Person):

    def __init__(self):
        super().__init__()
        self.position = input("Enter the position of the employee: ")
        self.salary = int(input("Enter the salary of the employee: "))

    def get_position(self):
        return self.position

    def get_salary(self):
        return self.salary

    def position(self):
        self.position = input("Enter the position of the employee: ")

    def salary(self):
        self.salary = int(input("Enter the salary of the employee: "))

    def print(self):
        print(self.Id, self.name, self.surname, self.position, self.salary)
