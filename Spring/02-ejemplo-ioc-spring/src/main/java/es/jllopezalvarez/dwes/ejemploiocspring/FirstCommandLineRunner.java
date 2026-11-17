package es.jllopezalvarez.dwes.ejemploiocspring;

import es.jllopezalvarez.dwes.ejemploiocspring.services.user.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;

@Component
public class FirstCommandLineRunner implements CommandLineRunner {

    @Autowired
    private UserService userService;

    @Override
    public void run(String... args) throws Exception {
        System.out.println("Esto también lo escribo yo, pero desde el Command Line Runner");

        System.out.println("Voy a crar un objeto user. Para hacerlo uso el userService que me ha dado el contenedor de IoC");

        User user = userService.createUser("jllopezalvarez", "José Luis", "López Álvarez");




    }
}
