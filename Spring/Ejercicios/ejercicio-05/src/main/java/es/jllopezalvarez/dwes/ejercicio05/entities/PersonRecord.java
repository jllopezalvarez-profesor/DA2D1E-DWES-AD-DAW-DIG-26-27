package es.jllopezalvarez.dwes.ejercicio05.entities;

import java.time.LocalDate;

public record PersonRecord(String dni, String firstName, String lastName, LocalDate birthDate) {
    public int getAge() {
        return 0;
    }
}
