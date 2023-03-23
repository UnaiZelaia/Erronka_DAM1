from os import *

class Employee:
        def __init__(self, name, position, salary):
            self.name = name
            self.position = position
            self.salary = salary

class Canteen:
        def __init__(self, file_name):
            self.file_name = file_name

        def read_file(self):
            try:
                with open(self.file_name, 'r') as file:
                    lines = file.readlines()
                    employees = []
                    for line in lines:
                        employee_data = line.split(',')
                        name = employee_data[0].strip()
                        position = employee_data[1].strip()
                        salary = int(employee_data[2].strip())
                        employee = Employee(name, position, salary)
                        employees.append(employee)
                    return employees
            except FileNotFoundError:
                print(f"{self.file_name} does not exist")

        def write_file(self, employees):
            with open(self.file_name, 'w') as file:
                for employee in employees:
                file.write(f"{employee.name}, {employee.position}, {employee.salary}\n")

        def add_employee(self, employee):
            employees = self.read_file()
            employees.append(employee)
            self.write_file(employees)

        def edit_employee(self, old_employee, new_employee):
            employees = self.read_file()
            index = employees.index(old_employee)
            employees[index] = new_employee
            self.write_file(employees)

        def delete_employee(self, employee):
            employees = self.read_file()
            employees.remove(employee)
            self.write_file(employees)
