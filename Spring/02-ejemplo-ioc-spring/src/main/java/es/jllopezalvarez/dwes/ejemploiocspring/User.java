package es.jllopezalvarez.dwes.ejemploiocspring;

import java.util.UUID;

public class User {
    private final UUID userId;
    private final String username;
    private final String firstName;
    private final String lastName;

    public UUID getUserId() {
        return userId;
    }

    public String getUsername() {
        return username;
    }

    public String getFirstName() {
        return firstName;
    }

    public String getLastName() {
        return lastName;
    }

    public User(UUID userId, String username, String firstName, String lastName) {
        this.userId = userId;
        this.username = username;
        this.firstName = firstName;
        this.lastName = lastName;
    }


}
