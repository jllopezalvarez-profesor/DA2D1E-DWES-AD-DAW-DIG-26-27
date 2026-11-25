package es.jllopezalvarez.dwes.ejercicio05.entities;

import lombok.*;

import java.time.LocalDate;
import java.time.Period;


@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
@EqualsAndHashCode(onlyExplicitlyIncluded = true)
@Builder
public class Person {
    @Setter(AccessLevel.NONE)
    @EqualsAndHashCode.Include
    private String dni;
    private String firstName;
    private String lastName;
    private LocalDate birthDate;

    private int getAge(){
        return Period.between(this.birthDate, LocalDate.now()).getYears();
    }

}
