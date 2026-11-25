package es.jllopezalvarez.dwes.ejercicio05.services;

import es.jllopezalvarez.dwes.ejercicio05.entities.Person;

import java.util.List;

public interface PersonService {
    List<Person> find(int count);
    Person findOne();
}
