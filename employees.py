class Employee:

    def __init__(self, i, n, s, sal, p):
        self.Id = i
        self.name = n
        self.surname = s
        self.salary = sal
        self.position = p

    def get_Id(self):
        return self.Id

    def get_name(self):
        return self.name

    def get_surname(self):
        return self.surname

    def get_salary(self):
        return self.salary

    def get_position(self):
        return self.position

    def Id(self):
        self.Id = input("enter enployee Id")

    def name(self):
        self.name = input("enter enployee name")

    def surname(self):
        self.surname = input("enter enployee surname")

    def salary(self):
        self.salary = input("enter enployee salary")

    def position(self):
        self.position = input("enter enployee position")

    def print(self):
        print(self.Id ,self.name, self.surname, self.salary, self.position)

e1= Employee(3,"iker","nistal",3660,"cooker")
e1.print()