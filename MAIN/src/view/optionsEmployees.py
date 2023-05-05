import os
from MAIN.src.model.Employees import Employee
from MAIN.src.controller import Employeesfunctions


def employeesubmenu():
    dir_path = os.path.dirname(os.path.realpath(__file__))
    file_path = os.path.join(dir_path, "..", "..", "files", "employee.pkl")
    repeat = True
    while repeat:
        print("\n============================================================")
        print("             Employees menu")
        print("\t1- Add a new employee")
        print("\t2- Read all the employees")
        print("\t3- Edit an employee")
        print("\t4- Delete an employee")
        print("\t5- Exit")
        print("============================================================\n")
        a = int(input("Select the option that you want:  "))

        if a == 1:
            e1 = Employee()
            Employeesfunctions.add(e1, file_path)
        elif a == 2:
            print("These are the employees:  \n ")
            Employeesfunctions.read(file_path)
        elif a == 3:
            Employeesfunctions.read(file_path)
            Employeesfunctions.edit(file_path)
        elif a == 4:
            Employeesfunctions.read(file_path)
            Employeesfunctions.delete(file_path)
        elif a == 5:
            break
        else:
            print("Invalid option")
            employeesubmenu()
        repeat_input = input("Do you want to perform another operation? (y/n): ")
        if repeat_input.lower() == 'n':
            repeat = False
