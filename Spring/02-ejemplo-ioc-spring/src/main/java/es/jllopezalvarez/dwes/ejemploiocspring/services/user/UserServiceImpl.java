package es.jllopezalvarez.dwes.ejemploiocspring.services.user;


import es.jllopezalvarez.dwes.ejemploiocspring.User;
import es.jllopezalvarez.dwes.ejemploiocspring.services.mail.MailService;
import org.springframework.stereotype.Component;

import java.util.Random;
import java.util.UUID;

@Component
public class UserServiceImpl implements UserService {

    private static final Random random = new Random();

    // Aunque funciona no se recomienda porque no es lo mejor para pruebas unitarias.
    // @Autowired

    private final MailService mailService;

    public UserServiceImpl(MailService mailService) {
        this.mailService = mailService;
    }



    @Override
    public User createUser(String username, String firstName, String lastName){
        // TODO: Crear el usuario en la BD
        User user = new User(UUID.randomUUID(), username, firstName, lastName  );
        mailService.sendUserCreatedEmail(user);
        return user;
    }

    @Override
    public boolean deleteUserById(UUID userId){
        // TODO: Buscar el usuario por id y eliminarlo
        return random.nextBoolean();
    }

    @Override
    public boolean deleteUserByUsername(String username){
        // TODO: Buscar el usuario por nombre de usuario y eliminarlo
        return random.nextBoolean();
    }

    // Aunque es válida no es la más habitual
//    @Autowired
//    public void setMailService(MailService mailService) {
//        this.mailService = mailService;
//    }
}
