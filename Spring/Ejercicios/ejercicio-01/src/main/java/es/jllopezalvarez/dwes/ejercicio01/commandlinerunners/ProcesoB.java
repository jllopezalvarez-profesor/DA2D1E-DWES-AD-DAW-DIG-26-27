package es.jllopezalvarez.dwes.ejercicio01.commandlinerunners;

import org.springframework.boot.CommandLineRunner;
import org.springframework.core.Ordered;
import org.springframework.stereotype.Component;

@Component
public class ProcesoB implements CommandLineRunner, Ordered {
    @Override
    public void run(String... args) throws Exception {
        System.out.printf("En el método run de %s.%n", this.getClass().getName());
    }

    @Override
    public int getOrder() {
        return 0;
    }
}
