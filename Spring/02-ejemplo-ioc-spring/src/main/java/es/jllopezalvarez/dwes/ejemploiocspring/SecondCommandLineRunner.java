package es.jllopezalvarez.dwes.ejemploiocspring;

import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;

@Component
public class SecondCommandLineRunner implements CommandLineRunner {
    @Override
    public void run(String... args) throws Exception {
        System.out.println("Este es el segundo command line runner.");
    }
}
