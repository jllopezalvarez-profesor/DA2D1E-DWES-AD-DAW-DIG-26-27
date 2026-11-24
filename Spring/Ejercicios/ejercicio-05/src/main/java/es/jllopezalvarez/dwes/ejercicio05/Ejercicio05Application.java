package es.jllopezalvarez.dwes.ejercicio05;

import es.jllopezalvarez.dwes.ejercicio05.entities.Person;
import es.jllopezalvarez.dwes.ejercicio05.entities.PersonRecord;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

import java.time.LocalDate;

@SpringBootApplication
public class Ejercicio05Application {

    public static void main(String[] args) {
        SpringApplication.run(Ejercicio05Application.class, args);

        Person person = new Person();

        PersonRecord pr = new PersonRecord("", "", "", LocalDate.now());





    }

}
