import pickle
from src.model.User import User
from src.model.Reserve import Reserve
from src.model.Menu import Menu

def createNewUserObject():
    name = input("Select a name for the new user: ")
    surname = input("Select a surname for the new user: ")
    email = input("Select a new email for the new user: ")
    dni = input("Select the users id (dni): ")

    user = User(dni, name, surname, email)
    return user


def createMenuObject():
    name = input("Menu name")
    opt = 1
    items = list()
    while opt == 1:
        item = input("Enter a new item for the menu.")
        items.append(item)
        opt = int(input("Do you want to add another item? 1- yes 2- no"))

    menu = Menu(name, items)
    return menu


def createReserveObject():
    cm = 1
    cd = 1
    year = input("Enter the year for the reservation: ")
    while cm == 1:
        month = int(input("Enter the month for the reservation: "))
        if month <= 0 or month > 12:
            print("Wrong month. Plase enter a value between 1 and 12")
        else:
            cm = 2

    while cd == 1:
        day = int(input("Enter the day for the reservation: "))
        if day <= 0 or day > 32:
            print("Wrong month. Plase enter a value between 1 and 12")
        else:
            cd = 2

    date = str(day) + '-' + str(month) + '-' + str(year)
    user = input("Enter the user id (dni) for the new reservation: ")
    menu = input("Enter the name of the menu for the new reservation: ")

    reservation = Reserve(user, menu, date)
    return reservation


def writeUserToFile(user):
    f = open("../files/Users.pkl", "ab")

    with f as outp:
        pickle.dump(user, outp, pickle.HIGHEST_PROTOCOL)


def writeMenuToFile(menu):
    f = open("../files/Menus.pkl", "ab")

    with f as outp:
        pickle.dump(menu, outp, pickle.HIGHEST_PROTOCOL)


def writeReserveToFile(reserve):
    f = open("../files/Reserves.pkl", "ab")

    with f as outp:
        pickle.dump(reserve, outp, pickle.HIGHEST_PROTOCOL)


def readUsers():
    f = open("../files/Users.pkl", "rb")

    objects = []
    cont = 1
    while cont == 1:
        try:
            objects.append(pickle.load(f))
        except EOFError:
            cont = 0
    for st in objects:
        print(st.id_user, " - ", st.name, " - ", st.surname, " - ", st.email, " - ", st.role)


def readMenus():
    f = open("../files/Menus.pkl", "rb")

    objects = []
    cont = 1
    while cont == 1:
        try:
            objects.append(pickle.load(f))
        except EOFError:
            cont = 0
    for st in objects:
        print(st.name, " - ", st.items)


def readReserves():
    f = open("../files/Reserves.pkl", "rb")

    objects = []
    cont = 1
    while cont == 1:
        try:
            objects.append(pickle.load(f))
        except EOFError:
            cont = 0
    for st in objects:
        st.print()

            #print(st.date, " - ", st.id_user, " - ", st.id_menu)


def deleteReserve(self, user, menu, date):
    f = open("../files/Reserves.pkl", "r+")

    def save_object(obj, filename):
        with open(filename, 'ab') as outp:  # Overwrites any existing file.
            pickle.dump(obj, outp, pickle.HIGHEST_PROTOCOL)
