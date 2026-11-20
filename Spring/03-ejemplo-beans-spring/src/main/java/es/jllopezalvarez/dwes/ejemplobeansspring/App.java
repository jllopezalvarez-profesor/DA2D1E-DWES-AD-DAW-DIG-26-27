package es.jllopezalvarez.dwes.ejemplobeansspring;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.ImportResource;

@SpringBootApplication
@ImportResource("classpath:beans.xml")
public class App {

    public static void main(String[] args) {
        SpringApplication.run(App.class, args);




    }

}
