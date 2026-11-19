package es.jllopezalvarez.dwes.ejercicio01.commandlinerunners;

import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;

@Component
public class ProcesoC implements CommandLineRunner {
    @Override
    public void run(String... args) throws Exception {
        System.out.printf("En el método run de %s.%n", this.getClass().getName());
    }
}
