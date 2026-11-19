package es.jllopezalvarez.dwes.ejercicio01.commandlinerunners;

import org.springframework.boot.CommandLineRunner;
import org.springframework.core.annotation.Order;
import org.springframework.stereotype.Component;

@Component
@Order(1)
public class ProcesoA implements CommandLineRunner {
    @Override
    public void run(String... args) throws Exception {
        System.out.printf("En el método run de %s.%n", this.getClass().getName());
    }
}
