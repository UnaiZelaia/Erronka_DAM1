from MAIN.src.main import Residentmain, Employeesmain, MenusMain


def printMainProgram():
    while True:
        run = range(1, 5)
        print("\n ============================================================")
        print("             Manage of the Canteen")
        print("\t1- Employees options.")
        print("\t2- Menu options.")
        print("\t3- Resident options.")
        print("\t4- Exit.")
        print("============================================================ \n")
        opt = int(input("Select an option: "))
        if opt in run:

            match opt:
                case 1:
                    Employeesmain.optionsEmployees.employeesubmenu()
                case 2:
                    MenusMain.optionsMenu.printMainMenu()
                case 3:
                    Residentmain.optionsResident.printResidentMain()
                case 4:
                    exit()
        else:
            printMainProgram()
