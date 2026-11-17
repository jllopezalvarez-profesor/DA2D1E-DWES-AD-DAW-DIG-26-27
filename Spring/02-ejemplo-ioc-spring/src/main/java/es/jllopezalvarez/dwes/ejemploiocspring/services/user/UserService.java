package es.jllopezalvarez.dwes.ejemploiocspring.services.user;



import es.jllopezalvarez.dwes.ejemploiocspring.User;

import java.util.UUID;

public interface UserService {
    User createUser(String username, String firstName, String lastName);

    boolean deleteUserById(UUID userId);

    boolean deleteUserByUsername(String username);
}
