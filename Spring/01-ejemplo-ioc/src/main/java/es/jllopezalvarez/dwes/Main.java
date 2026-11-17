package es.jllopezalvarez.dwes;

//TIP To <b>Run</b> code, press <shortcut actionId="Run"/> or
// click the <icon src="AllIcons.Actions.Execute"/> icon in the gutter.
public class Main {
    public static void main(String[] args) {
        UserService userService = new UserServiceImpl();

        // crear un usuario
        User user = userService.createUser("jllopezalvarez", "José Luis", "López Álvarez");

        // Eliminar el usuario pero con un nombre incorrecto
        userService.deleteUserByUsername("jllopez");

        // Eliminar correctamente
        userService.deleteUserById(user.getUserId());
    }
}