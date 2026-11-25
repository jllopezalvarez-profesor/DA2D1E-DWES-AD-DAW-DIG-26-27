package es.jllopezalvarez.dwes.ejercicio05.services;

import es.jllopezalvarez.dwes.ejercicio05.entities.Person;
import net.datafaker.Faker;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class PersonServiceImpl implements PersonService {
    private final Faker faker;

    public PersonServiceImpl(Faker faker) {
        this.faker = faker;
    }

    @Override
    public List<Person> find(int count) {
        return List.of();
    }

    @Override
    public Person findOne() {
        return Person.builder()
                .dni(faker.idNumber().valid())
                .firstName(faker.name().firstName())
                .lastName(faker.name().lastName())
                .birthDate(faker.timeAndDate().birthday(20, 40))
                .build();


    }
}
