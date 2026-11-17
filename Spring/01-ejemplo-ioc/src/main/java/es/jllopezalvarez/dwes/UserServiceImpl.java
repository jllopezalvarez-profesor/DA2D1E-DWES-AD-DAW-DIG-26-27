package es.jllopezalvarez.dwes;

import java.util.Random;
import java.util.UUID;

public class UserServiceImpl implements UserService {

    private static final Random random = new Random();
    private MailService mailService = new MailServiceImpl();

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
}
