from MAIN.src.model.Employees import *
from MAIN.src.model.Person import *
import pickle


def read(filename):
    inp = open(filename, "rb")
    employeelist = []

    continueloop = True

    while continueloop:
        try:
            employeelist.append(pickle.load(inp))
        except EOFError:
            continueloop = False

    # show all employees

    for employee in employeelist:
        employee.print()


def add(obj, filename):
    # Overwrites any existing file.
    with open(filename, 'ab') as outp:
        pickle.dump(obj, outp, pickle.HIGHEST_PROTOCOL)
    print("Employee added successfully")


def delete(filename):
    # Prompt the user to select an employee to delete
    employee_id = int(input("Enter the ID of the employee you want to delete: \n "))

    # Search for the corresponding Employee object in the pickle file
    with open(filename, 'rb') as inp:
        objects = []
        cont = 1
        while cont == 1:
            try:
                objects.append(pickle.load(inp))
            except EOFError:
                print("end of employees\n")
                cont = 0
        for i, em in enumerate(objects):
            if em.Id == employee_id:
                # Delete the Employee object from the pickle file
                del objects[i]

    # Save the changes to the pickle file
    with open(filename, 'wb') as outp:
        for obj in objects:
            pickle.dump(obj, outp, pickle.HIGHEST_PROTOCOL)


def edit(filename):
    # Prompt the user to select the employee they want to edit
    employee_id = int(input("Enter the ID of the employee you want to edit: \n  "))

    # Search for the corresponding Employee object in the pickle file
    with open(filename, 'rb') as inp:
        objects = []
        cont = 1
        while cont == 1:
            try:
                objects.append(pickle.load(inp))
            except EOFError:
                print("end of employees\n")
                cont = 0
        for i, em in enumerate(objects):
            if em.get_Id() == employee_id:
                # Allow the user to edit the attributes of the Employee object
                new_name = input("Enter the new name of the employee: \n")
                new_surname = input("Enter the new surname of the employee: \n ")
                new_position = input("Enter the new position of the employee: \n ")
                new_salary = int(input("Enter the new salary of the employee: \n "))
                objects[i].name = new_name
                objects[i].surname = new_surname
                objects[i].position = new_position
                objects[i].salary = new_salary
            # Save the changes to the pickle file
    with open(filename, 'wb+') as outp:
        for obj in objects:
            pickle.dump(obj, outp, pickle.HIGHEST_PROTOCOL)
