import datetime

from src.model import Menu, User, Reserve


def printMainMenu():
    print("============================================================")
    print("Select on of the options:")
    print("\t1- Manage reservations.")
    print("\t2- Create new user.")
    print("\t3- Create new menu")
    print("============================================================")
    opt = int(input("Select an option: "))

    match(opt):
        case 1:
            printReserveSubmenu()
        case 2:
            id = int(input("Enter the id for the user."))
            name = input("Enter the name of the user")
            surname = input("Enter the surname of the user")
            email = input("Enter the email for the user")
            user = User.User(id, name, surname, email)
            user.newUser()
        case 3:
            id_menu = int(input("Enter the id of the menu"))
            name = input("Enter the name of the menu")
            items = []
            a = 1

            while(a == 1):
                items.append(input("Enter an item"))
                a = int(input("Press 1 to keep adding items.\nPress any other key to stop."))

            menu = Menu.Menu(id_menu, name, items)
            menu.newMenu()
        case default:
            exit()

def printReserveSubmenu():
    print("============================================================")
    print("Managing reservations: Choose an option.")
    print("\t1- Show reservations.")
    print("\t2- Create a new reservation.")
    print("\t3- Delete a reservation.")
    print("\t4- Go back.")
    print("============================================================")
    opt = int(input("Select an option: "))

    match(opt):
        case 1:
            Reserve.printReserves()
        case 2:
            userId = int(input("User id for the reservation: "))
            menuId = int(input("Menu id fot the reservation: "))
            day = int(input("Day for the reservation date: "))
            month = int(input("Month for the reservation date"))
            year = int(input("Year for the reservation date: "))
            datetime.date(year, month, day)
            Reserve.newReserve()




