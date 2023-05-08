package model;

public class MenuItems{
	private Menu idMenu;
	private Items idItems;

	public MenuItems(Menu idMenu, Items idItems) { 
		this.idMenu = idMenu;
		this.idItems = idItems;
	}

	//Metodos atributo: idMenu
	public Menu getIdMenu() {
		return idMenu;
	}
	public void setIdMenu(Menu idMenu) {
		this.idMenu = idMenu;
	}
	//Metodos atributo: idItems
	public Items getIdItems() {
		return idItems;
	}
	public void setIdItems(Items idItems) {
		this.idItems = idItems;
	}
}