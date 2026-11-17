package es.jllopezalvarez.dwes;

import java.util.UUID;

public interface UserService {
    User createUser(String username, String firstName, String lastName);

    boolean deleteUserById(UUID userId);

    boolean deleteUserByUsername(String username);
}
